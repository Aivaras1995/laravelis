<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Managers\FileManager;
use App\Managers\ProductManager;
use App\Models\File;
use App\Models\Products;
use http\Client\Request;

class ProductsController extends Controller
{
    public function __construct(protected FileManager $fileManager, ProductManager $productManager)
    {
        $this->productManager = $productManager;
    }

    public function index()
    {
        $products = Products::query()->with(['category', 'status'])->get();

        return view('products.index', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $product = Products::create($request->all());
        $this->productManager->addImage($product, $request);

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
        $this->productManager->updateMainImage($product, $request);

        return redirect()->route('products.show', $product);
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function destroyFile(File $file)
    {
        $file?->deleteOrFail();

        return redirect()->back()->with('success', 'File deleted');
    }
}
