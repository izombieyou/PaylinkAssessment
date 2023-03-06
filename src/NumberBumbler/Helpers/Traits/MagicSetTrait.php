<?php
declare(strict_types=1);

namespace App\NumberBumbler\Helpers\Traits;

trait MagicSetTrait
{
    public function __set($property, $value)
    {
        if (method_exists($this, 'set' .ucfirst($property))) {
            return $this->{'set' .ucfirst($property)}($value);
        }
        throw new Exception('Property setter does not exist: ' . $property);
    }
}