<?php


namespace Brain\Game\Prime;

use function Brain\Engine\start;

defined('RULE_PRIME') or define('RULE_PRIME', 'Answer "yes" if given number is prime. Otherwise answer "no".');

function run()
{
    $game = function () {
        $question = rand(1, MAX_RANDOM_NUMBER_IN_QUESTION);
        $answer = isPrime($question) ? YES_ANSWEER : NO_ANSWEER;

        return [$question, $answer];
    };
    start($game, RULE_PRIME);
}

function isPrime(int $num): bool
{
    if ($num == 2) {
        return true;
    }
    if ($num == 1 || $num % 2 == 0) {
        return false;
    }
    $to = sqrt($num) + 1;
    for ($i = 3; $i <= $to; $i += 2) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}
