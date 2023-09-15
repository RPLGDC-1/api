<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageTrait;
use Faker\Factory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $data['products'] = Product::get();
        return view('admin.product.index', $data);
    }

    public function create()
    {
        $data['products'] = Product::get();

        $data['categories'] = Category::get();
        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'selling_price' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $image = $this->uploadFileFromRequest('image', 'products');

        $faker = Factory::create('id_ID');

        Product::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'image' => $request->image,
            'quantity' => $request->stock,
            'price' => $request->price,
            'selling_price' => $request->selling_price,
            'category_id' => $request->category_id,
            'rating' => $faker->randomFloat(1, 1, 5), // Angka desimal acak antara 1 dan 5
            'sold' => 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Action successfully completed.');
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return back()->with('success', 'Action successfully completed.');
        } catch(\Exception $e) {
            return back()->with('error', "Somethin went wrong with code {$e->getCode()}");
        }
    }
}
