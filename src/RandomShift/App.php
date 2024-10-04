<?php

namespace App\RandomShift;

use App\RandomShift\Decorator\BenchableRandomShiftDecorator;
use App\RandomShift\RandomNumber\Rand;
use App\RandomShift\Strategy\AnotherFunctionalRandomShift;
use App\RandomShift\Strategy\FunctionalRandomShift;
use App\RandomShift\Strategy\ImperativeRandomShift;
use App\RandomShift\Strategy\AlternativeFunctionalRandomShift;

class App
{
    use BenchableTrait;

    private string $type;

    public function run(array $nums, string $type): void
    {
        $this->type = $type;

        $strategy = match ($this->type) {
            'imperative' =>  static function () {
                return
                    new BenchableRandomShiftDecorator(
                      new ImperativeRandomShift()
                    )
                ;
            },
            'functional' => static function () {
                return
                    new BenchableRandomShiftDecorator(
                        new FunctionalRandomShift()
                    )
                ;
            },
            'alt_functional' => static function () {
                return
                    new BenchableRandomShiftDecorator(
                        new AlternativeFunctionalRandomShift()
                    )
                ;
            },
            'another_functional' => static function () {
                return
                    new BenchableRandomShiftDecorator(
                        new AnotherFunctionalRandomShift()
                    )
                ;
            },
            default => null,
        };

        if (!$strategy) {
            return;
        }

        $program = $strategy();
        $program->randShift($nums, new Rand());

//        if ($program instanceof PrintableInterface) {
//            $program->print();
//        }

        if ($program instanceof BenchableRandomShiftDecorator) {
            assert($program instanceof BenchableRandomShiftDecorator);
            echo sprintf("Total execution time: %s", (\DateTime::createFromFormat('u', $program->getDuration()))->format('H:i:s.u')) . PHP_EOL;
        }
    }

    public function getType(): string
    {
        return $this->type;
    }
}
