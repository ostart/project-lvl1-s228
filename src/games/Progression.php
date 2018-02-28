<?php

namespace BrainGames\Progression;

use function BrainGames\Cli\playGame;

const LENGTH = 10;

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
        $init = rand(0, 100);
        $step = rand(1, 10);
        $progression = generateProgression($init, LENGTH, $step);
        $position = rand(0, LENGTH - 1);
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
