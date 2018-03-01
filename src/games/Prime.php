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
    $disclaimer = 'Is this number prime?';

    $getData = function () {
        $number = rand(1, 100);
        $answer = (isPrime($number)) ? 'yes' : 'no';
        return [$number, $answer];
    };
    
    playGame($disclaimer, $getData);
}
