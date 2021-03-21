<?php


namespace Brain\Game\Progression;

use function Brain\Engine\start;

defined('MAX_NUMBERS_COUNT_IN_EXPRESSION') or define('MAX_NUMBERS_COUNT_IN_EXPRESSION', 10);
defined('RULE_PROGRESSION') or define('RULE_PROGRESSION', 'What number is missing in the progression?');
defined('REPLACEMENT_STRING') or define('REPLACEMENT_STRING', '..');

define('NUMBERS_COUNT_MIN', 5);
define('NUMBERS_COUNT_MAX', 10);
define('STEP_SIZE_FROM', 2);
define('STEP_SIZE_TO', 5);
define('NUMBERS_FROM', 1);


function run()
{
    $game = function () {
        $len = rand(NUMBERS_COUNT_MIN, NUMBERS_COUNT_MAX);
        $step = rand(STEP_SIZE_FROM, STEP_SIZE_TO);
        $numbers = range(NUMBERS_FROM, $step * $len, $step);
        $hiddenPosition = rand(0, count($numbers) - 1);
        $answer = $numbers[$hiddenPosition];
        $numbers[$hiddenPosition] = REPLACEMENT_STRING;
        $question = implode(" ", $numbers);

        return [$question, $answer];
    };
    start($game, RULE_PROGRESSION);
}
