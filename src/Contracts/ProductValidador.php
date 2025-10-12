<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductValidator
{
    /**
     * @param array{id?:int,name?:string,price?:float} $input
     * 
     * @return array<string,string>
     */
    public function validate(array $input): array;
}