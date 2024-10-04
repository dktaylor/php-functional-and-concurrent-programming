<?php

namespace App\RandomShift\Strategy;

use App\RandomShift\RandomNumber\Rand;

class AlternativeFunctionalRandomShift extends AbstractRandShift
{
    public function randShift(array $nums, Rand $rand): array
    {
        $this->nums = array_reduce($nums, function ($carry, $num) use ($rand) {
            $shiftedNum = $num + $rand(-10, 11);

            return $shiftedNum > 0 ? array_merge($carry, [$shiftedNum]) : $carry;
        }, []);

        return $this->nums;
    }
}
