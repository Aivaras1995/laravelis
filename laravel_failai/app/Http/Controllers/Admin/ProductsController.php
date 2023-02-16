<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Managers\FileManager;
use App\Models\Products;

class ProductsController extends Controller
{
    public function __construct(protected FileManager $fileManager)
    {
    }

    public function index()
    {
        $products = Products::query()->with(['category', 'status'])->get();

        return view('products.index', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $product = Products::create($request->all());
        $file = $this->fileManager->saveFile($request, 'image','img/products');
        // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
        $product->image = $file->url;
        $product->save();

        return redirect()->route('products.show', $product);
    }

    public function create()
    {
        return view('products.create_edit');
    }

    public function show(Products $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Products $product)
    {
        return view('products.create_edit', compact('product'));
    }

    public function update(ProductRequest $request, Products $product)
    {
        $product->update($request->all());
        // Paimti sena paveiksla ir istrinti ji is serverio
        // $this->fileManager->removeFile($product->image, ??, ??);
        $file = $this->fileManager->saveFile($request, 'foto','img/products');
        // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
        $product->image = $file->url;
        $product->save();

        return redirect()->route('products.show', $product);
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
