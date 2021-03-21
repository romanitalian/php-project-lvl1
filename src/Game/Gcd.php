<?php


namespace Brain\Game\Gcd;

use function Brain\Engine\start;

defined('RULE_GCD') or define('RULE_GCD', 'Find the greatest common divisor of given numbers.');

function run()
{
    $game = function () {
        $val1 = rand(1, MAX_RANDOM_NUMBER_IN_QUESTION);
        $val2 = rand(1, MAX_RANDOM_NUMBER_IN_QUESTION);
        $question = "{$val1} $val2";
        $answer = gcd($val1, $val2);

        return [$question, $answer];
    };
    start(
        $game,
        RULE_GCD
    );
}

function gcd($v1, $v2): int
{
    $gcd = gmp_gcd($v1, $v2);

    return (int)$gcd;
}
