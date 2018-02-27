<?php

namespace BrainGames\Even;

use function BrainGames\Cli\playGame;

function run()
{
    $disclaimer = 'Answer "yes" if number even otherwise answer "no".';
    $question = function () {
        return rand(1, 100);
    };
    $result = function ($quest) {
        return ($quest % 2 === 0) ? 'yes' : 'no';
    };
    playGame($disclaimer, $question, $result);
}
