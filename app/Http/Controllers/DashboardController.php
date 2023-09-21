<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data['hot_products'] = Product::orderBy('sold', "DESC")->take(4)->get();
        $data['recent_orders'] = Transaction::take(4)->with(['product', 'user'])->latest()->get();
        $data['total_transactions'] = Transaction::count();
        $data['total_transaction_pendings'] = Transaction::whereStatus('pending')->count();
        $data['total_customers'] = User::whereType('user')->count();
        $data['total_products'] = Product::count();
        $data['total_admins'] = User::whereType('admin')->count();

        return view('dashboard.index', $data);
    }

    public function revenue()
    {
        return Transaction::selectRaw('COUNT(id) as total, status')->groupBy('status')->get();
    }

    public function invoice()
    {
        return Transaction::selectRaw('SUM(price) as price, SUM(subtotal) as subtotal, MONTH(created_at) as month')->groupBy(DB::raw('MONTH(created_at)'))->get();
    }
}
