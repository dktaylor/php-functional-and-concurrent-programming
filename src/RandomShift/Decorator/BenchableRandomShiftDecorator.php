<?php

namespace App\RandomShift\Decorator;

use App\RandomShift\BenchableTrait;
use App\RandomShift\PrintableInterface;
use App\RandomShift\RandomNumber\Rand;
use App\RandomShift\Strategy\RandomShiftInterface;

class BenchableRandomShiftDecorator implements RandomShiftInterface, PrintableInterface
{
    use BenchableTrait;

    private float $startTime;
    private float $endTime;

    public function __construct(
        private readonly RandomShiftInterface $inner
    ) {}

    public function randShift(array $nums, Rand $rand): array
    {
        $this->startTime = hrtime(true);
        $result = $this->inner->randShift($nums, $rand);
        $this->endTime = hrtime(true);

        return $result;
    }

    public function print(): void
    {
        if ($this->inner instanceof PrintableInterface) {
            $this->inner->print();
        }
    }
}
