<?php

declare(strict_types=1);

namespace App\Contracts;

final class ProductValidator
{
    /**
     * @param array{name?:string,price?:float} $input
     */
    public function validate(array $input): array
    {
        $errors = [];

        $name = $input['name'] ?? '';
        $price = $input['price'] ?? '';

        if (strlen($name) < 2 || strlen($name) > 100) {
            $errors[] = 'Por favor, insira um nome com tamanho válido.';
        }

        if ($price < 0) {
            $errors[] = 'Por favor, insira um valor válido.';
        }

        return $errors;
    }
}
