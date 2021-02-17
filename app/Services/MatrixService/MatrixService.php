<?php

declare(strict_types=1);

namespace App\Services\MatrixService;

/**
 * MatrixService is a service that exposes methods that
 * execute matrix multiplication on two operands, and
 * methods that validate the operands beforehand.
 * The operands must be 2-dimensional arrays.
 * Even a 1xn matrix (single row) will be represented by
 * a 2-dimensional array of length = 1. This will facilitate
 * the multiplication.
 */
class MatrixService implements MatrixServiceInterface
{
    private array $matrix_a;
    private array $matrix_b;

    public function __construct(array $matrix_a = array(), array $matrix_b = array())
    {
        parent::__construct();
        $this->matrix_a = $matrix_a;
        $this->matrix_b = $matrix_b;
    }
    /**
     * multiply will take 2 arrays and do matrix multiplication.
     *
     * @param  mixed $matrix_a
     * @param  mixed $matrix_b
     * @return array
     */
    public static function multiply(array $matrix_a, array $matrix_b): array
    {
        if (!self::canMultiply($matrix_a, $matrix_b)) {
            // @todo log
            return [];
        } else {
            throw new Exception('The matrices can\'t be multiplied due to their shape');
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
     * and if they can be multiplied (height of A = width of B)
     *
     * @param  array $matrix_a
     * @param  array $matrix_b
     * @return bool
     */
    public static function canMultiply(array $matrix_a, array $matrix_b): bool
    {
        if (!(self::isMatrix($matrix_b) && self::isMatrix($matrix_b))) {
            return false;
        }
        if (!(count($matrix_a) == self::rowLength($matrix_b))) {
            return false;
        }
        return true;
    }
    private static function convertToLetters(int $value): string
    {
        // ASCII A-Z is 65-90
        return '';
    }
}
