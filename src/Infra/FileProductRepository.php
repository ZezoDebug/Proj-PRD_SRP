<?php

declare(strict_types=1);

namespace App\Infra;

use App\Contracts\ProductRepository;

final class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath = __DIR__ . '/../../storage/products.txt')
    {
        $this->filePath = $filePath;
    }

    public function save(array $product): void
    {
        $nextId = $this->getNextId();
        $product['id'] = $nextId;

        $json = json_encode($product, JSON_THROW_ON_ERROR);
        file_put_contents($this->filePath, $json . PHP_EOL, FILE_APPEND);
    }

    public function findAll(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $products = [];
        foreach ($lines as $line) {
            $products[] = json_decode($line, true, 512, JSON_THROW_ON_ERROR);
        }

        return $products;
    }

    private function getNextId(): int
    {
        $products = $this->findAll();
        if (empty($products)) {
            return 1;
        }

        $last = end($products);
        return $last['id'] + 1;
    }
}