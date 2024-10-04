<?php

namespace App\RandomShift\RandomNumber;

class Rand
{
    public function __invoke(int $min, int $max)
    {
        return rand($min, $max);
    }
}
