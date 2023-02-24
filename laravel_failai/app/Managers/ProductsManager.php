<?php

namespace App\Managers;

use App\Models\Products;
use App\Repositories\ProductsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ProductsManager
{
    public function __construct(protected ProductsRepository $repository)
    {
    }

    public function getById(int $id): Model|Products
    {
        return $this->repository->getById($id);
    }

}
