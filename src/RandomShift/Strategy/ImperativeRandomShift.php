<?php

namespace App\RandomShift\Strategy;

use App\RandomShift\RandomNumber\Rand;

class ImperativeRandomShift extends AbstractRandShift
{
    // Imperative code
    public function randShift(array $nums, Rand $rand): array
    {
        $shiftedNums = [];
        foreach ($nums as $num) {
            $shifted = $num + $rand(-10, 11);
            if ($shifted > 0) {
                $shiftedNums[] = $shifted;
            }
        }

        $this->nums = $shiftedNums;
        return $this->nums;
    }
}
