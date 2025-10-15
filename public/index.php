<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPR Demo</title>
</head>

<body>
    <h1>Cadastro de usuário</h1>
    <form action="register.php" method="POST">
        <label>Nome<input type="text" name="name" required></label>
        <label>Preço<input type="number" name="price" required></label>
        <button type="submit">Cadastrar Produto</button>
    </form>

    <a href="products.php">Listar Produtos Cadastrados</a>
</body>

</html>