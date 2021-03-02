<?php

declare(strict_types=1);

namespace App\Services\MatrixService;

interface MatrixServiceInterface
{
    public static function isMatrix(array $matrix): bool;
    public static function canMultiply(array $matrix_a, array $matrix_b): bool;
    public static function multiply(array $matrix_a, array $matrix_b): array;
}
