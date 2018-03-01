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
    $disclaimer = 'Balance the given number.';

    $getData = function () {
        $number = rand(100, 9999);
        $answer = balance("{$number}");
        return [$number, $answer];
    };

    playGame($disclaimer, $getData);
}
