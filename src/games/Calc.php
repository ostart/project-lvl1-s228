<?php

namespace BrainGames\Calc;

use function BrainGames\Cli\playGame;

const ARR = ["+", "-", "*"];

class Pointer
{
    public static $pointer = 0;
}

function run()
{
    $disclaimer = 'What is the result of the expression?';
    $question = function () {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $sign = ARR[Pointer::$pointer++];
        return "{$number1} {$sign} {$number2}";
    };
    $result = function ($quest) {
        list($number1, $sign, $number2) = explode(' ', $quest);
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
    playGame($disclaimer, $question, $result);
}
