<?php

namespace App\Chapter02\Section2;



use App\Chapter02\Section1\Abs;

class Dots
{
    public function __construct(
        private Abs $abs
    ) {}

    public function dots(int $length): string
    {
        return str_repeat(".", $length);
    }

    public function demo1(): string
    {
        return $this->dots(($this->abs)(-3));
    }

    public function demo2(): string
    {
        $num = -3;
        $num = ($this->abs)($num);

        return $this->dots($num);
    }
}
