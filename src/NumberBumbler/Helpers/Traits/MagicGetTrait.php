<?php
declare(strict_types=1);

namespace App\NumberBumbler\Helpers\Traits;

trait MagicGetTrait
{
    public function __get($property)
    {
        if (method_exists($this, 'get' .ucfirst($property))) {
            return $this->{'get' .ucfirst($property)}();
        }
        throw new Exception('Property getter does not exist: ' . $property);
    }
}