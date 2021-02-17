<?php

namespace App\Http\Controllers;

class MatrixMultiplier extends Controller
{
    public function multiply(Request $request, MatrixServiceInterface $operands)
    {
        $validated = $request->validate([
            'matrix_a' => 'required|array',
            'matrix_b' => 'required|array',
        ]);

        $result = $operands->multiply();
    }
}
