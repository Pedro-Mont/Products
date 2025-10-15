<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;
use App\Application\ProductService;
use App\Contracts\ProductValidator;
use App\Application\ListProductsService;

$filePath = __DIR__ . '/../storage/products.txt';

$service = new ProductService(new FileProductRepository($filePath), new ProductValidator());
$list = new ListProductsService(new FileProductRepository($filePath));

$products = $list->findAll();
    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>

<body>
    <h1>Produtos Cadastrados</h1>

    <?php if (empty($products)): ?>
        <p>Nenhum produto cadastrado ainda.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <strong>Nome:</strong> <?= htmlspecialchars($product['name']) ?> |
                    <strong>Preço:</strong> R$ <?= number_format($product['price'], 2, ',', '.') ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="index.php">Voltar para o Cadastro</a>
</body>

</html>