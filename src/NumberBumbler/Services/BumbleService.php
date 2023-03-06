<?php

declare(strict_types=1);

namespace App\NumberBumbler\Services;

use App\NumberBumbler\Models\FizzBuzz;
use App\NumberBumbler\Models\Fibonacci;

/**
 * The functions that service the test needs
 *
 * @author Alan
 */
class BumbleService
{
    private Fibonacci $fibonacci;
    private FizzBuzz $fizzBuzz;

    public function __construct(FizzBuzz $fizzBuzz, Fibonacci $fibonacci)
    {
        $this->fizzBuzz = $fizzBuzz;
        $this->fibonacci = $fibonacci;
    }

    public function fizzBuzz(int $from = 1, int $to = 20): array
    {
        return $this->fizzBuzz->fizzBuzz($from, $to);
    }

    public function fizzBuzzer(int $from = 1, int $to = 20): array
    {
        $this->fizzBuzz->to = $to;
        $this->fizzBuzz->from = $from;
        return $this->fizzBuzz->startFizzBuzz();
    }

    public function fibonacci(int $fibonacciDepth): int
    {
        return $this->fibonacci->getSequence($fibonacciDepth);
    }
}