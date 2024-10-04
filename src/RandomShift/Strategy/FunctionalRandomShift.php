<?php

namespace App\RandomShift\Strategy;

use App\RandomShift\RandomNumber\Rand;

class FunctionalRandomShift extends AbstractRandShift
{
    public function randShift(array $nums, Rand $rand): array
    {
        $this->nums = array_filter(
            array_map(static function (int $num) use ($rand) {
                return $num + $rand(-10, 11);
            }, $nums),
            static function ($num) {
                return $num > 0;
            })
        ;

        return $this->nums;
    }
}
