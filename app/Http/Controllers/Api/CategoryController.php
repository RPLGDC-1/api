<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiTrait;

    public function index(Request $request)
    {
        return $this->sendResponse(Category::all());
    }
}
