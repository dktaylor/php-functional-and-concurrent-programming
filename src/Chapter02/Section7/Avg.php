<?php

namespace App\Chapter02\Section7;

class Avg
{
    private $average;

    public function __construct(?callable $average = null)
    {
        $this->average = $average;
    }

    public function __invoke(float $first, float ...$others): float
    {
        return ($first + array_sum($others)) / (1 + count($others));
    }

    public function get(float $first, float ...$others): float
    {
        return ($this->average)($first, ...$others);
    }
}
