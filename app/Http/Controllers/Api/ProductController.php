<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaginationCollection;
use App\Models\Product;
use App\Pipelines\LikeFilter;
use App\Pipelines\WhereFilter;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;

class ProductController extends Controller
{
    use ApiTrait;

    public function index(Request $request)
    {
        $model = Pipeline::send(Product::query())
            ->through([
                new LikeFilter('name'),
                new WhereFilter('category_id'),
            ])
            ->thenReturn();

        return $this->sendResponse(new PaginationCollection($model->paginate()));
    }
}
