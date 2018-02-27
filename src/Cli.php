<?php
namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const COUNTER = 0;
const SUCCESSTRY = 3;

function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
}

function iter($counter, $successTry, $getQuestion, $calcResult)
{
    if ($counter === $successTry) {
        return true;
    }

    $quest = $getQuestion();
    line("Question: %s", $quest);
    $answer = prompt('Your answer: ', false, '');
    $result = $calcResult($quest);

    if ($answer === $result) {
        line('Correct!');
        return iter($counter + 1, $successTry, $getQuestion, $calcResult);
    }

    line("%s is wrong answer ;(. Correct answer was %s.", $answer, $result);
    return false;
}

function playGame($disclaimer, $getQuestion, $calcResult)
{
    line('Welcome to the Brain Game!');
    line($disclaimer);
    line();

    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);

    $isCorrect = iter(COUNTER, SUCCESSTRY, $getQuestion, $calcResult);

    if ($isCorrect) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}
