<?php

namespace BrainGames\Prime;

use function BrainGames\Cli\playGame;

function isPrime($a)
{
    $iter = function ($number, $base) use (&$iter) {
        if ($base > $number / 2) {
            return true;
        }
        if ($number % $base === 0) {
            return false;
        }
        return $iter($number, $base + 1);
    };
  
    return $iter($a, 2);
}

function run()
{
    $number = 0;
    $disclaimer = 'Is this number prime?';

    $getQuestion = function () {
        global $number;
        $number = rand(1, 100);
        return $number;
    };

    $getEtalonAnswer = function () {
        global $number;
        return (isPrime($number)) ? 'yes' : 'no';
    };
    
    playGame($disclaimer, $getQuestion, $getEtalonAnswer);
}
