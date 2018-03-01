<?php

namespace BrainGames\Even;

use function BrainGames\Cli\playGame;

function run()
{
    $disclaimer = 'Answer "yes" if number even otherwise answer "no".';

    $getData = function () {
        $number = rand(1, 100);
        $answer = ($number % 2 === 0) ? 'yes' : 'no';
        return [$number, $answer];
    };
    
    playGame($disclaimer, $getData);
}
