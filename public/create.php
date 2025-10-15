<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Josvitor\SolidSrpDemo\Application\ProductService;
use Josvitor\SolidSrpDemo\Infra\FileProductRepository;
use Josvitor\SolidSrpDemo\Domain\SimpleProductValidator;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método não permitido. Use POST.";
    exit;
}

$input = [
    'name' => $_POST['name'] ?? '',
    'price' => isset($_POST['price']) ? (float)$_POST['price'] : null,
];

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();

$service = new ProductService($repository, $validator);

$errors = $service->create($input);

if (!empty($errors)) {
    http_response_code(422);
    echo "<h2>Erros de validação:</h2><ul>";
    foreach ($errors as $field => $message) {
        echo "<li><strong>$field:</strong> $message</li>";
    }
    echo "</ul>";
    echo '<p><a href="products.php">Voltar para lista de produtos</a></p>';
    exit;
}

http_response_code(201);
echo "<p>Produto '{$input['name']}' cadastrado com sucesso!</p>";
echo '<p><a href="products.php">Ver produtos cadastrados</a></p>';
