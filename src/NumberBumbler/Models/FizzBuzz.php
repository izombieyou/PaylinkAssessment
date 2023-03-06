<?php
declare(strict_types=1);

namespace App\NumberBumbler\Models;

use App\NumberBumbler\Helpers\Traits\MagicGetTrait;
use App\NumberBumbler\Helpers\Traits\MagicSetTrait;

/**
 * The home of FizzBuzz shenanigans
 *
 * @author Alan
 */
class FizzBuzz
{
    use MagicGetTrait, MagicSetTrait;

    private const FIZZFACTOR = 3;
    private const BUZZFACTOR = 5;

    private const FIZZBUZZ = 'FizzBuzz';
    private const FIZZ = 'Fizz';
    private const BUZZ = 'Buzz';

    protected int $beginValue = 1, $endValue = 20;

    public function fizzBuzz(int $from = 1, int $to = 20): array
    {
        $fizzBuzzResults = [];
        if ($to < $from) {
            return $fizzBuzzResults;
        }
        for ($currentIndex = $from ; $currentIndex <= $to; $currentIndex++) {
            $fizzBuzzResults[$currentIndex] = $this->generateFizzBuzz($currentIndex);
        }
        return $fizzBuzzResults;
    }

    public function startFizzBuzz():array
    {
        return $this->fizzBuzz($this->from, $this->to);
    }

    public function setTo(int $value): void
    {
        $this->endValue = $value;
    }

    public function getTo(): int
    {
        return $this->endValue;
    }

    public function setFrom(int $value): void
    {
        $this->beginValue = $value;
    }

    public function getFrom(): int
    {
        return $this->beginValue;
    }

    private function generateFizzBuzz(int $fizzBuzzValue): string
    {
        if ($this->isValueFizzBuzz($fizzBuzzValue)) {
            return self::FIZZBUZZ;
        }
        if ($this->isValueBuzz($fizzBuzzValue)) {
            return self::BUZZ;
        }
        if ($this->isValueFizz($fizzBuzzValue)) {
            return self::FIZZ;
        }
        return (string) $fizzBuzzValue;
    }

    private function isValueFizz(int $value): bool
    {
        return $value % self::FIZZFACTOR === 0;
    }

    private function isValueBuzz(int $value): bool
    {
        return $value % self::BUZZFACTOR === 0;
    }

    private function isValueFizzBuzz(int $value): bool
    {
        return $this->isValueBuzz($value) && $this->isValueFizz($value);
    }

}