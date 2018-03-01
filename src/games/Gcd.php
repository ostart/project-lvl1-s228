<?php

namespace BrainGames\Gcd;

use function BrainGames\Cli\playGame;

function gcd($a, $b)
{
    if ($b === 0) {
        return $a;
    }
    return gcd($b, $a % $b);
}

function run()
{
    $disclaimer = 'Find the greatest common divisor of given numbers.';

    $getData = function () {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $question = "{$number1} {$number2}";
        $answer = ($number1 < $number2) ? gcd($number1, $number2) : gcd($number2, $number1);
        return [$question, "{$answer}"];
    };
    
    playGame($disclaimer, $getData);
}
