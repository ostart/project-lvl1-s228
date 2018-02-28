<?php

namespace BrainGames\Balance;

use function BrainGames\Cli\playGame;

function balance($a)
{
    $arr = str_split($a);
    sort($arr);
    if ($arr[count($arr) - 1] - $arr[0] <= 1) {
        return implode($arr);
    }
    
    $arr[0] = strval($arr[0] + 1);
    $arr[count($arr) - 1] = strval($arr[count($arr) - 1] - 1);
    return balance(implode($arr));
}

function run()
{
    $number = 0;
    $disclaimer = 'Balance the given number.';

    $getQuestion = function () {
        global $number;
        $number = rand(100, 9999);
        return $number;
    };

    $getEtalonAnswer = function () {
        global $number;
        return balance("{$number}");
    };
    
    playGame($disclaimer, $getQuestion, $getEtalonAnswer);
}
