<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();

$service = new ProductService($repository, $validator);

$products = $service->list();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            padding: 20px; 
        }
        table { 
            border-collapse: collapse; 
            width: 60%; margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #000; 
            padding: 8px; text-align: left; 
        }
        th { 
            background-color: #f2f2f2; 
        }
    </style>
</head>
<body>
    <h1>Produtos Cadastrados</h1>

    <?php if (empty($products)): ?>
        <p>Nenhum produto cadastrado.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço (R$)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$product['id']) ?></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= number_format((float)$product['price'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <a href="index.php">← Voltar ao Cadastro</a>
</body>
</html>
