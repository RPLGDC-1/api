<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class RecentOrderController extends Controller
{
    public function index()
    {
        $data['recent_orders'] = Transaction::with(['product', 'user'])->latest()->get();
        return view('admin.recent_order.index', $data);
    }
}
