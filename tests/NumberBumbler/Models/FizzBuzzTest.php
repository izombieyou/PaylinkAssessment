<?php
declare(strict_types=1);

namespace Tests\NumberBumbler\Models;

use App\NumberBumbler\Models\Fizzbuzz;
use Tests\TestCase;

class FizzBuzzTest extends TestCase
{
    public function fizzBuzzProvider(): array
    {
        return [
            [
                1,
                1,
                [1 => 1]
            ],
            [
                4,
                6,
                [4 => 4, 5 => 'Buzz', 6 => 'Fizz']
            ],
            [
                15,
                16,
                [15 => 'FizzBuzz', 16 => 16]
            ],
        ];
    }

    /**
     * @dataProvider fizzBuzzProvider
     * @param int   $from
     * @param int   $to
     * @param array $expected
     */
    public function testFizzBuzz(int $from, int $to, array $expected)
    {
        $fizzBuzz = new FizzBuzz();
        $this->assertEquals($expected, $fizzBuzz->fizzBuzz($from, $to));
    }

    public function startFizzBuzzProvider(): array
    {
        return [
            [
                25,
                30,
                [
                    25 => 'Buzz',
                    26 => 26,
                    27 => 'Fizz',
                    28 => 28,
                    29 => 29,
                    30 => 'FizzBuzz'
                ]
            ],
        ];
    }

    /**
     * @dataProvider startFizzBuzzProvider
     * @param int   $from
     * @param int   $to
     * @param array $expected
     */
    public function testStartFizzBuzz(int $from, int $to, array $expected)
    {
        $fizzBuzz = new FizzBuzz();
        $fizzBuzz->to = $to;
        $fizzBuzz->from = $from;
        $this->assertEquals($expected, $fizzBuzz->startFizzBuzz());
    }
}