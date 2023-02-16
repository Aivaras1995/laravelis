<?php

namespace App\Http\Controllers;

use App\Models\Products;

class ProductController extends Controller
{
    public function show(Products $product)
    {
        return view('product_show', ['product' => $product]);
    }
}
