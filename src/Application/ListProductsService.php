<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductRepository;

class ListProductsService
{
    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * @return array<int,array{name:string,price:float}>
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }
}