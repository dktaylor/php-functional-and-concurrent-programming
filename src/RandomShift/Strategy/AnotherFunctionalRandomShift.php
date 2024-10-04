<?php

namespace App\RandomShift\Strategy;

use App\RandomShift\RandomNumber\Rand;
use App\RandomShift\Strategy\AbstractRandShift;

class AnotherFunctionalRandomShift extends AbstractRandShift
{
    public function randShift(array $nums, Rand $rand): array
    {
        $shiftedNums = array_map(static function (int $num) use ($rand) {
            return $num + $rand(-10, 11);
        }, $nums);

        $this->nums = array_filter($shiftedNums, static function (int $num) {
            return $num > 0;
        });

        return $this->nums;
    }
}
