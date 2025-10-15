<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        form {
            width: 300px;
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            box-sizing: border-box;
        }
        button {
            margin-top: 15px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Produto</h1>

    <form action="create.php" method="POST">
        <label for="name">Nome do Produto:</label>
        <input type="text" id="name" name="name" minlength="2" maxlength="100" required>

        <label for="price">Preço (R$):</label>
        <input type="number" id="price" name="price" step="0.01" min="0" required>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="products.php">Ver Produtos Cadastrados</a>
</body>
</html>
