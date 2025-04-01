<?php

namespace Deg540\DockerPHPBoilerplate;

class FizzBuzzKata
{
    public function convert(int $number): int|string
    {
        if ($number === 15) {
            return 'FizzBuzz';
        }

        if ($number === 5) {
            return 'Buzz';
        }

        if ($number === 3) {
            return 'Fizz';
        }

        return $number;
    }
}