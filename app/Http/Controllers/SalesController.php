<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $data['transactions'] = Transaction::with(['product', 'user'])->whereStatus('paid')->orWhere('status', 'shipping')->latest()->get();
        return view('admin.sales.index', $data);
    }

    public function show(Transaction $transaction)
    {
        return $transaction;
    }

    public function process(Transaction $transaction)
    {
        $transaction->status = 'shipping';
        $transaction->save();

        return back()->with('success', 'Action successfully completed.');
    }
}
