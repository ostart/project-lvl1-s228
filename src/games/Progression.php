<?php

namespace BrainGames\Progression;

use function BrainGames\Cli\playGame;

function generateProgression($init, $length, $step)
{
    $arr = [];
    for ($i = 0; $i < $length; $i += 1) {
        $newElem = $init + ($i * $step);
        array_push($arr, $newElem);
    }
    return $arr;
}

function run()
{
    $number = 0;
    $disclaimer = 'What number is missing in this progression?';

    $getQuestion = function () {
        global $number;
        $length = 10;
        $init = rand(0, 100);
        $step = rand(1, 10);
        $progression = generateProgression($init, $length, $step);
        $position = rand(0, $length - 1);
        $number = $progression[$position];
        $progression[$position] = '..';
        return implode(' ', $progression);
    };

    $getEtalonAnswer = function () {
        global $number;
        return "{$number}";
    };
    
    playGame($disclaimer, $getQuestion, $getEtalonAnswer);
}
