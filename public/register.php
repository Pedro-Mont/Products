<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;
use App\Application\ProductService;
use App\Contracts\ProductValidator;

$filePath = __DIR__ . '/../storage/products.txt';

$service = new ProductService(new FileProductRepository($filePath), new ProductValidator());

$response = $service->register($_POST);

http_response_code($response ? 201 : 422);

echo $response ? 'Produto cadastrado com sucesso' : 'Falha ao cadastrar produto';