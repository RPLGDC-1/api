<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data['hot_products'] = Product::orderBy('sold', "DESC")->take(4)->get();
        $data['recent_orders'] = Transaction::take(4)->with(['product', 'user'])->latest()->get();

        return view('dashboard.index', $data);
    }
}
