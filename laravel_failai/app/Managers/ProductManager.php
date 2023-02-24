<?php

namespace App\Managers;

use App\Models\File;
use App\Models\Products;

class ProductManager
{
    protected const IMAGE_PATH       = 'img/products';
    protected const IMAGE_FIELD_NAME = 'foto';

    public function __construct(protected FileManager $fileManager,)
    {
    }

    public function updateMainImage(Products $product, $request): void
    {
        $this->fileManager->removeFile($product->image, $product->id, Products::class);
        $file = $this->fileManager->storeFile($request, self::IMAGE_FIELD_NAME, self::IMAGE_PATH);
        $this->fileManager->assignModel($file, $product);
        $this->assignMainImage($product, $file);
    }

    public function assignMainImage(Products $product, ?File $file): void
    {
        if ($file === null) {
            return;
        }

        $product->image   = $file->url;
        $file->model_id   = $product->id;
        $file->model_type = Products::class;
        $file->save();
        $product->save();
    }

    public function addImage(Products $product, $request): void
    {
        $file = $this->fileManager->storeFile($request, self::IMAGE_FIELD_NAME, self::IMAGE_PATH);
        $this->fileManager->assignModel($file, $product);
        $this->assignMainImage($product, $file);
    }
}
