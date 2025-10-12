<?php

declare(strict_types=1);

namespace App\Domain;

use App\Contracts\ProductValidator;

final class SimpleProductValidator implements ProductValidator
{
    public function validate(array $input): array
    {
        $errors = [];

        # Valida o Nome
        $name = $input['name'] ?? '';
        if (empty($name) || mb_strlen($name) < 2 || mb_strlen($name) > 100) {
            $errors['name'] = 'Nome deve ter  entre 2 e 100 caracteres';
        } 

        # Valida o preço
        $price = $input['prince'] ?? null;
        if (!is_numeric($price) || $price < 0) {
            $errors['price'] = 'Preço deve ser numérico e >= 0';
        }

        return $errors;
    }
}