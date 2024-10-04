<?php

namespace App\RandomShift\Strategy;

use App\RandomShift\PrintableInterface;

abstract class AbstractRandShift implements RandomShiftInterface, PrintableInterface
{
    protected array $nums = [];

    public function print(): void
    {
        echo static::class . " " . print_r($this->nums, true) . PHP_EOL;
    }
}
