<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::get();
        return view('admin.category.index', $data);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $model = new Category();
        $model->name = $request->name;
        $model->save();

        return back()->with('success', 'Action successfully completed.');
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->name;
        $category->save();

        return back()->with('success', 'Action successfully completed.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Action successfully completed.');
    }
}
