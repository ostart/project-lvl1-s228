<?php

namespace BrainGames\Even;

use function BrainGames\Cli\playGame;

function run()
{
    $number = 0;
    $disclaimer = 'Answer "yes" if number even otherwise answer "no".';

    $getQuestion = function () {
        global $number;
        $number = rand(1, 100);
        return $number;
    };

    $getEtalonAnswer = function () {
        global $number;
        return ($number % 2 === 0) ? 'yes' : 'no';
    };
    
    playGame($disclaimer, $getQuestion, $getEtalonAnswer);
}
