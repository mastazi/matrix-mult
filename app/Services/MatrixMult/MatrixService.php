<?php

namespace App\Services;

class MatrixService implements MatrixServiceInterface
{
    public static function multiply(array $matrix_a, array $matrix_b): array
    {
        if (!self::canMultiply($matrix_a, $matrix_b)) {
            // @todo log
            return [];
        } else {
            // @todo multiplication
        }
    }
    /**
     * isMatrix expects that an array should be 2-dimensional and rectangular,
     * otherwise it will return false.
     *
     * @param  array $matrix
     * @return bool
     */
    public static function isMatrix(array $matrix): bool
    {
        if (isRectangular($matrix)) {
            return true;
        }
        return false;
    }
    /**
     * isRectangular checks whether every row in the array has the same length,
     * but first we need to check that the array is 2-dimensional
     *
     * @param  array $matrix
     * @return bool
     */
    private static function isRectangular(array $matrix): bool
    {
        if (self::is2D($matrix)) {
            return false;
        }
        $length = null;
        foreach ($matrix as $row) {
            $rowLength = count($row);
            if (is_null($length)) {
                $length = $rowLength;
            } elseif ($rowLength != $length) {
                return false;
            }
        }
        return true;
    }
    /**
     * is2D checks whether the array is 2-dimensional
     *
     * @param  array $matrix
     * @return bool
     */
    private static function is2D(array $matrix): bool
    {
        foreach ($matrix as $row) {
            if (!is_array($row)) {
                return false;
            }
        }
        return true;
    }
    /**
     * rowLength checks the length of a row in the 2d array.
     * This is meant to be used in combination with isMatrix.
     *
     * @param  array $matrix
     * @return int
     */
    private static function rowLength(array $matrix): int
    {
        return count($matrix[0]);
    }
    /**
     * canMultiply checks if the 2 arrays are matrices,
     * and if they can be multiplied (height of A = width of B and vice versa)
     *
     * @param  array $matrix_a
     * @param  array $matrix_b
     * @return bool
     */
    private function canMultiply(array $matrix_a, array $matrix_b): bool
    {
        if (!(self::isMatrix($matrix_a) && self::isMatrix($matrix_b))) {
            return false;
        }
        if (!(self::rowLength($matrix_b == count($matrix_a)))) {
            return false;
        }
        return true;
    }
}
