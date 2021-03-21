<?php

namespace Brain\Game\Calc;

use function Brain\Engine\start;

defined('OPERATIONS') or define('OPERATIONS', ['+', '-', '*']);
defined('GAME_RULES_MSG') or define('GAME_RULES_MSG', 'What is the result of the expression?');

function run()
{
    $game = function () {
        $val1 = rand(1, MAX_RANDOM_NUMBER_IN_QUESTION);
        $val2 = rand(1, MAX_RANDOM_NUMBER_IN_QUESTION);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $question = "$val1 $operation $val2";
        $answer = evaluateExpression($val1, $operation, $val2);

        return [$question, $answer];
    };
    start($game, GAME_RULES_MSG);
}

function evaluateExpression($val1, $op, $val2): int
{
    switch ($op) {
        case '+':
            return $val1 + $val2;
        case '-':
            return $val1 - $val2;
        case '*':
            return $val1 * $val2;
    }
}
