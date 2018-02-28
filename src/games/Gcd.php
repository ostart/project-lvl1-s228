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
    $number1 = 0;
    $number2 = 0;
    $disclaimer = 'Find the greatest common divisor of given numbers.';

    $getQuestion = function () {
        global $number1, $number2;
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        return "{$number1} {$number2}";
    };

    $getEtalonAnswer = function () {
        global $number1, $number2;
        $gcdResult = ($number1 < $number2) ? gcd($number1, $number2) : gcd($number2, $number1);
        return "{$gcdResult}";
    };
    
    playGame($disclaimer, $getQuestion, $getEtalonAnswer);
}
