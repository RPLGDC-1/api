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

class TransactionController extends Controller
{
    use ApiTrait;

    public function __construct()
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_PRODUCTION');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$appendNotifUrl = env('APP_URL');
        \Midtrans\Config::$overrideNotifUrl = env('APP_URL');
        \Midtrans\Config::$paymentIdempotencyKey = env('MIDTRANS_IDEMPOTENCY_KEY');
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

            $params = array(
                'enable_payments' => [
                    'credit_card', 'mandiri_clickpay', 'cimb_clicks',
                    'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va',
                    'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret',
                    'danamon_online', 'akulaku'
                ],
                'transaction_details' => [
                    'order_id' => $transaction->invoice_number,
                    'gross_amount' => $transaction->subtotal,
                ],
                'item_details' => [
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $transaction->subtotal,
                        'quantity' => 1,
                    ]
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'phone' => $request->phone,
                ],
            );

            $snap = \Midtrans\Snap::createTransaction($params);

            $transaction->payment_url = $snap->redirect_url;
            $transaction->save();

            DB::commit();

            return $this->sendResponse([
                'message' => 'Transaction checkout successfully.',
                'payment_url' => $snap->redirect_url,
            ]);
        } catch (\Exception $e) {
            return $this->sendResponse($e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        $transactionId =  @explode('.', $request->order_id)[1];
        if (!$transactionId) {
            return 'Transaction Not Found.';
        }

        PaymentLog::create([
            'url' => $request->url(),
            'method' => $request->method(),
            'headers' => json_encode($request->header()),
            'body' => json_encode($request->all()),
            'transaction_id' => $transactionId,
        ]);

        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;


        $transaction = Transaction::find($transactionId);

        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $transaction->status = 'expired';
            } else if ($fraud == 'accept') {
                $transaction->status = 'paid';
            }
        } else if ($transaction == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $transaction->status = 'cancel';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $transaction->status = 'cancel';
            }
        } else if ($transaction == 'deny') {
            $transaction->status = 'cancel';
        } else if ($transaction == 'settlement') {
            $transaction->status = 'paid';
        }

        $transaction->save();
    }
}
