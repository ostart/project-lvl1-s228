<?php

namespace BrainGames\Calc;

use function BrainGames\Cli\playGame;

const SIGNARRAY = ['+', '-', '*'];

function Calculate($number1, $number2, $sign)
{
    switch ($sign) {
        case '+':
            $sum = $number1 + $number2;
            return "{$sum}";
            break;
        case '-':
            $dif = $number1 - $number2;
            return "{$dif}";
            break;
        case '*':
            $mul = $number1 * $number2;
            return "{$mul}";
            break;
    }
}

function run()
{
    $disclaimer = 'What is the result of the expression?';

    $getData = function () {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $sign = SIGNARRAY[array_rand(SIGNARRAY)];
        $question = "{$number1} {$sign} {$number2}";
        $answer = Calculate($number1, $number2, $sign);
        return [$question, $answer];
    };

    playGame($disclaimer, $getData);
}
