<?php

namespace BrainGames\Progression;

use function BrainGames\Cli\playGame;

const LENGTH = 10;

function generateProgression($number)
{
    $position = rand(0, LENGTH - 1);
    $step = rand(1, 10);
    $first = $number - $step * $position;

    $iter = function ($init, $step, $i, $array) use (&$iter, $number) {
        if ($i >= LENGTH) {
            return $array;
        }
        $current = $init + ($i * $step);
        $current = ($current === $number) ? '..' : $current;
        array_push($array, $current);
        return $iter($init, $step, $i + 1, $array);
    };

    $progression = $iter($first, $step, 0, []);
    return implode(' ', $progression);
}

function run()
{
    $disclaimer = 'What number is missing in this progression?';

    $getData = function () {
        $number = rand(10, 100);
        $progression = generateProgression($number);
        return [$progression, "{$number}"];
    };
    
    playGame($disclaimer, $getData);
}
