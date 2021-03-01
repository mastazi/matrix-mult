<?php

namespace App\Http\Controllers;

class MatrixMultiplier extends Controller
{
    use App\Services\Api;

    public function multiply(Request $request, MatrixServiceInterface $operands)
    {
        $validated = $request->validate([
            'matrix_a' => 'required|array',
            'matrix_b' => 'required|array',
        ]);

        $matrix_a = $request->input('matrix_a');
        $matrix_b = $request->input('matrix_b');

        // if ($someCondition) {
        //     return $this->sendError(
        //         [
        //             'message' => 'some_message'
        //         ],
        //         500
        //     );
        // }


        // $result = $operands->multiply($matrix_a, $matrix_b);
        $result = array(array(1,2,3), array(4,5,6));

        return $this->sendSuccess(
            [
                'data' => $result
            ],
            200
        );
    }
}
