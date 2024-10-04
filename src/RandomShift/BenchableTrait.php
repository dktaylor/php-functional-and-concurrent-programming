<?php

namespace App\RandomShift;

trait BenchableTrait
{
    private float $startTime;
    private float $endTime;

    public function start(): void
    {
        $this->startTime = hrtime(true);
    }

    public function stop(): void
    {
        $this->endTime = hrtime(true);
    }

    public function getDuration(): string
    {
        // Does not account for processes that run for longer than 23:59:59.999999
        return (\DateTime::createFromFormat('U.u', $this->calculateTime()))->format('u');
    }

    private function calculateTime(): float
    {
        return ($this->endTime - $this->startTime)/1e+6;
    }
}
