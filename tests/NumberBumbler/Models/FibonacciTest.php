<?php
declare(strict_types=1);

namespace Tests\NumberBumbler\Models;

use App\NumberBumbler\Models\Fibonacci;
use Tests\TestCase;

class FibonacciTest extends TestCase
{
    public function fibonacciProvider(): array
    {
        return [
            [0, 0],
            [1, 0],
            [2, 1],
            [3, 1],
            [4, 2],
            [5, 3],
            [6, 5],
            [12, 89],
        ];
    }

    /**
     * @dataProvider fibonacciProvider
     * @param int   $sequence
     * @param int   $fibonacciValue
     */
    public function testFibonacci(int $sequence, int $fibonacciValue)
    {
        $fibonacci = new Fibonacci();
        $this->assertEquals($fibonacciValue, $fibonacci->getSequence($sequence));
    }
}