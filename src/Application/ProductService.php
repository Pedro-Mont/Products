<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array{name:string,price:float} $input
     */
    public function register(array $input): bool
    {
        $errors = $this->validator->validate($input);
        if (!empty($errors)) {
            return false;
        }

        $product = [
            'id' => $this->repository->getNextId(),
            'name' =>  isset($input['name']) ? (string) $input['name'] : 'Nome do produto',
            'price' => isset($input['price']) ? (float) $input['price'] : 10.0,
        ];

        $this->repository->save($product);
        return true;
    }
}
