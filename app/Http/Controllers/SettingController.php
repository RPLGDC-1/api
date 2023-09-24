<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function product()
    {
        Product::query()->delete();
        return back()->with('success', 'Action successfully completed.');
    }

    public function transaction()
    {
        Transaction::query()->delete();
        return back()->with('success', 'Action successfully completed.');
    }
}
