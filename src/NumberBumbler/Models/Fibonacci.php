<?php
declare(strict_types=1);

namespace App\NumberBumbler\Models;

/**
 * Calcuates nth number in fibonacci sequence
 *
 * @author Alan
 */
class Fibonacci
{
    public function getSequence(int $sequence): int
    {
        switch ($sequence) {
            case 0:
            case 1:
                return 0;
            case 2:
                return 1;
        }
        return $this->getSequence($sequence -2) + $this->getSequence($sequence -1);
    }
}