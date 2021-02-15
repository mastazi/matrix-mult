<?php

namespace App\Services\MatrixService;

interface MatrixServiceInterface
{
    public function isRectangular(array $matrix): bool;
    public function is2D(array $matrix): bool;
    public function canMultiply(array $matrix_a, array $matrix_b): bool;
}
