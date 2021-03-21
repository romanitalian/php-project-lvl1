<?php


namespace Brain\Game\Even;

use function Brain\Engine\start;

defined('RULE_EVEN') or define('RULE_EVEN', 'Answer "yes" if the number is even, otherwise answer "no".');


function run()
{
    $game = function () {
        $question = rand(1, MAX_RANDOM_NUMBER_IN_QUESTION);
        $answer = isEven($question) ? YES_ANSWEER : NO_ANSWEER;

        return [$question, $answer];
    };
    start($game, RULE_EVEN);
}

function isEven($number): bool
{
    return $number % 2 == 0;
}
