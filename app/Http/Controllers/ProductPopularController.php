<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductPopularController extends Controller
{
    public function index()
    {
        $data['hot_products'] = Product::orderBy('sold', "DESC")->get();
        return view('admin.product_popular.index', $data);
    }
}
