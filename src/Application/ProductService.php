<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

final class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $input): array
    {
        $errors = $this->validator->validate($input);
        if (!empty($errors)) {
            return $errors;
        }

        $product = [
            'name' => (string)$input['name'],
            'price' => (float)$input['price'],
        ];

        $this->repository->save($product);

        return [];
    }

    public function list(): array
    {
        return $this->repository->findAll();
    }
}
