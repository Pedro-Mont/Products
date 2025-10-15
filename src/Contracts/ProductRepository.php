<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductRepository
{
    public function getNextId(): int;
    /**
     * @param array{id:int,name:string,price:float} $product
     */
    public function save(array $product): void;

    /**
     * @return array<int,array{name:string,price:float}>
     */
    public function findAll(): array;
}
