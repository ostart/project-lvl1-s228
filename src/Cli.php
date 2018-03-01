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

function iter($counter, $successTry, $getData)
{
    if ($counter === $successTry) {
        return true;
    }

    list($question, $rightAnswer) = $getData();
    line("Question: %s", $question);
    $userAnswer = prompt('Your answer: ', false, '');

    if ($userAnswer === $rightAnswer) {
        line('Correct!');
        return iter($counter + 1, $successTry, $getData);
    }

    line("%s is wrong answer ;(. Correct answer was %s.", $userAnswer, $rightAnswer);
    return false;
}

function playGame($disclaimer, $getData)
{
    line('Welcome to the Brain Game!');
    line($disclaimer . PHP_EOL);
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!" . PHP_EOL, $name);

    $isCorrect = iter(COUNTER, SUCCESSTRY, $getData);

    if ($isCorrect) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}
