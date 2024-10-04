<?php

namespace App\RandomShift\Strategy;

use App\RandomShift\RandomNumber\Rand;

interface RandomShiftInterface
{
    public function randShift(array $nums, Rand $rand): array;
}
