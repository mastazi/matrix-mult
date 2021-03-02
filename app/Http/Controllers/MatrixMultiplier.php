<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Api\ApiStructureTrait;
use Illuminate\Http\Request;
use App\Services\MatrixService\MatrixServiceInterface;

class MatrixMultiplier extends Controller
{
    use ApiStructureTrait;

    public function multiply(Request $request, MatrixServiceInterface $matrix)
    {
        $validated = $request->validate([
            'matrix_a' => 'required|array',
            'matrix_b' => 'required|array',
        ]);

        $matrix_a = $request->input('matrix_a');
        $matrix_b = $request->input('matrix_b');

        if (!($matrix::isMatrix($matrix_a) && $matrix::isMatrix($matrix_b))) {
            return $this->sendError(
                [
                    'message' => 'One or both operands are not a matrix. We need 2D arrays of rectangular shape.'
                ],
                500
            );
        }

        if (!$matrix::canMultiply($matrix_a, $matrix_b)) {
            return $this->sendError(
                [
                    'message' => 'The two matrices can\'t be multiplied because they don\'t have reciprocal dimensions.'
                ],
                500
            );
        }


        $result = $matrix->multiply($matrix_a, $matrix_b);

        return $this->sendSuccess(
            [
                'data' => $result
            ],
            200
        );
        //return json_encode("hi there");
    }
}
