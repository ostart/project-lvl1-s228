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

function iter($counter, $successTry, $getQuestion, $getEtalonAnswer)
{
    if ($counter === $successTry) {
        return true;
    }

    $question = $getQuestion();
    line("Question: %s", $question);
    $userAnswer = prompt('Your answer: ', false, '');
    $etalonAnswer = $getEtalonAnswer();

    if ($userAnswer === $etalonAnswer) {
        line('Correct!');
        return iter($counter + 1, $successTry, $getQuestion, $getEtalonAnswer);
    }

    line("%s is wrong answer ;(. Correct answer was %s.", $userAnswer, $etalonAnswer);
    return false;
}

function playGame($disclaimer, $getQuestion, $getEtalonAnswer)
{
    line('Welcome to the Brain Game!');
    line($disclaimer);
    line();

    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);

    $isCorrect = iter(COUNTER, SUCCESSTRY, $getQuestion, $getEtalonAnswer);

    if ($isCorrect) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}
