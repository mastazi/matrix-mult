<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\MatrixService\MatrixService;

class MatrixTest extends TestCase
{
    protected $matrixA;
    protected $matrixB;
    protected $notRectangular;
    protected $not2D;
    protected $notMultipliable;
    protected $expectedResult;

    /**
     * Setting up all the matrices needed for testing
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->matrixA = array(array(1, 2, 3), array(4, 5, 6));
        $this->matrixB = array(array(7, 8), array(9, 10), array(11, 12));
        $this->notRectangular = array(array(1, 2, 3), array(4,5));
        $this->not2D = array(1,2,3);
        // The row length of the following array is != number of rows of matrixB
        $this->notMultipliable = array(array(1, 2, 3, 4), array(5, 6, 7, 8));
        $this->expectedResult = array(array(58, 64), array(139, 154));
    }
    /**
     * Testing that the matrix should be 2D
     * and rectangular in shape.
     *
     * @return void
     */
    public function testMatrixProperties()
    {
        $matrix = new MatrixService();
        $this->assertTrue($matrix::isMatrix($this->matrixA));
        $this->assertFalse($matrix::isMatrix($this->not2D));
        $this->assertFalse($matrix::isMatrix($this->notRectangular));
        $this->assertFalse($matrix::canMultiply($this->notMultipliable, $this->matrixB));
    }
    /**
     * test the matrix multiplication,
     * using the example at
     * https://www.mathsisfun.com/algebra/matrix-multiplying.html
     * (hence known to be correct)
     *
     * @return void
     */
    public function testMultiply()
    {
        $matrix = new MatrixService();
        $this->assertEquals($matrix::multiply($this->matrixA, $this->matrixB), $this->expectedResult);
    }
}
