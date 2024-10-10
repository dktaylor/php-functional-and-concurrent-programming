<?php

namespace App\Chapter02\Section1;

class Abs
{
    // Not a true absolute value method
    public function __invoke(int $num): int
    {
        return $num > 0 ? $num : -$num;
    }
}
