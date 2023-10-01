<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaginationCollection;
use App\Models\PaymentLog;
use App\Models\Product;
use App\Models\Transaction;
use App\Pipelines\WhereFilter;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Pipeline;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

class TransactionController extends Controller
{
    use ApiTrait;

    public function __construct()
    {
        Configuration::setXenditKey(config('xendit.api_key'));
    }

    public function index(Request $request)
    {
        $model = Pipeline::send(Transaction::query())
            ->through([
                new WhereFilter('status'),
            ])
            ->thenReturn()
            ->with('product')
            ->whereUserId(Auth::id())
            ->latest();

        return $this->sendResponse(new PaginationCollection($model->paginate()));
    }

    public function checkoutData(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);

        return $this->sendResponse([
            'product' => $product,
            'price' => ($product->selling_price * $request->quantity),
            'subtotal' => ($product->selling_price * $request->quantity) + Transaction::SHIPPING_PRICE,
            'shipping_price' => Transaction::SHIPPING_PRICE,
        ]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'quantity' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
        ]);

        DB::beginTransaction();

        try {

            $product = Product::find($request->product_id);

            $transaction = Transaction::create([
                'invoice_number' => "INV" . date('YmdHis') . rand(1000, 9999),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => 'pending',
                'user_id' => Auth::id(),

                // Pricing
                'price' => ($product->selling_price * $request->quantity),
                'subtotal' => ($product->selling_price * $request->quantity) + Transaction::SHIPPING_PRICE,
                'shipping_price' => Transaction::SHIPPING_PRICE,
            ]);

            $transaction->invoice_number = $transaction->invoice_number . '.' . $transaction->id;
            $transaction->save();


            $apiInstance = new InvoiceApi();
            $params = array(
                'external_id' => $transaction->invoice_number,
                'description' => "Payment for " .  $product->name . " by " . $request->user()->name,
                'amount' => $transaction->subtotal,
                'invoice_duration' => 10,
                'currency' => 'IDR',
                'success_redirect_url' => env('WEB_URL') . '/transaction',
                'failure_redirect_url' => env('WEB_URL') . '/transaction',
                'remainder_time' => 1,
            );


            $invoice = $apiInstance->createInvoice($params);

            $transaction->payment_url = $invoice['invoice_url'];
            $transaction->save();

            DB::commit();

            return $this->sendResponse([
                'message' => 'Transaction checkout successfully.',
                'payment_url' => $transaction->payment_url,
            ]);
        } catch (\Exception $e) {
            if($e instanceof \Xendit\XenditSdkException) {
                return $this->sendResponse($e->getFullError(), 500);
            }
            return $this->sendResponse($e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        PaymentLog::create([
            'url' => $request->url(),
            'method' => $request->method(),
            'headers' => json_encode(collect($request->header())->transform(function ($item) {
                return $item[0];
            })),
            'body' => json_encode($request->all()),
            'external_id' => $request->external_id,
        ]);

        try {
            if ($request->hasHeader('x-callback-token')) {
                if ($request->header('x-callback-token') != config('xendit.callback_token')) {
                    return $this->sendError(401, 'callback-token tidak valid');
                } else {
                    $apiInstance = new InvoiceApi();
                    $result = $apiInstance->getInvoiceById($request->id);
    
                    $transaction = Transaction::whereInvoiceNumber($result['external_id'])->firstOrFail();
                    if($transaction->status == 'pending') {
                        if($result['status'] == "PAID" || $result['status'] == 'SETTLED') {
                            $transaction->status = 'paid';
                        } else if($result['status'] == "CANCEL"){
                            $transaction->status = 'cancel';
                        } else {
                            $transaction->status = 'expired';
                        }
    
                        $transaction->save(); 
                        return $this->sendResponse('Success');                   
                    }

                    return $this->sendResponse('Transaction already', 400);
                }
            }

            return $this->sendResponse('Callback token invalid', 400);
        } catch(\Exception $e) {
            return $this->sendResponse($e->getMessage(), 500);
        }
    }
}
