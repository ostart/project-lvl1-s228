<?php

namespace BrainGames\Calc;

use function BrainGames\Cli\playGame;

const ARR = ['+', '-', '*'];

function run()
{
    $number1 = 0;
    $number2 = 0;
    $sign = ARR[0];
    $disclaimer = 'What is the result of the expression?';

    $getQuestion = function () {
        global $number1, $number2, $sign;
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        static $pointer = 0;
        $sign = ARR[$pointer++];
        return "{$number1} {$sign} {$number2}";
    };

    $getEtalonAnswer = function () {
        global $number1, $number2, $sign;
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
    };

    playGame($disclaimer, $getQuestion, $getEtalonAnswer);
}
