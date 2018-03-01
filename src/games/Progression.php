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
    $disclaimer = 'What number is missing in this progression?';

    $getData = function () {
        $init = rand(0, 100);
        $step = rand(1, 10);
        $progression = generateProgression($init, LENGTH, $step);
        $position = rand(0, LENGTH - 1);
        $number = $progression[$position];
        $progression[$position] = '..';
        $question = implode(' ', $progression);
        return [$question, "{$number}"];
    };
    
    playGame($disclaimer, $getData);
}
