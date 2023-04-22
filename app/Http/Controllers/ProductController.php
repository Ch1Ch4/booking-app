<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function index(): JsonResource
    {
        return ProductResource::collection(Product::all());
    }

    public function show(Product $product): JsonResource
    {
        return new ProductResource($product);
    }
}
