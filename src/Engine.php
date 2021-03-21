<?php


namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

defined('ASK_COUNT') or define('ASK_COUNT', 3);
defined('WELCOME_MSG') or define('WELCOME_MSG', "Welcome to Brain Games!");
defined('FAIL_GEME_MSG') or define('FAIL_GEME_MSG', "'%s' is wrong answer ;(. Correct answer was '%s'.");
defined('CORRECT_MSG') or define('CORRECT_MSG', "Correct!");
defined('QUESTION_MSG') or define('QUESTION_MSG', "Question: %s");
defined('HELLO_MSG') or define('HELLO_MSG', "Hello, %s!");
defined('ASK_USER_NAME_MSG') or define('ASK_USER_NAME_MSG', "May I have your name?");
defined('YOUR_ANSWER_MSG') or define('YOUR_ANSWER_MSG', "Your answer");
defined('TRY_AGAIN_MSG') or define('TRY_AGAIN_MSG', "Your answer");
defined('CONGRATULATIONS_MSG') or define('CONGRATULATIONS_MSG', "Congratulations, %s!");
defined('MAX_RANDOM_NUMBER_IN_QUESTION') or define('MAX_RANDOM_NUMBER_IN_QUESTION', 100);
defined('YES_ANSWEER') or define('YES_ANSWEER', 'yes');
defined('NO_ANSWEER') or define('NO_ANSWEER', 'no');

function start($getQuestionFunc, $rule)
{
    line(WELCOME_MSG);
    line($rule);
    $userName = prompt(ASK_USER_NAME_MSG);
    line(HELLO_MSG, $userName);

    game_round($getQuestionFunc, $userName);
}

function game_round($getQuestionFunc, string $userName): void
{
    for ($i = 0; $i < ASK_COUNT; $i++) {
        [$question, $ans] = $getQuestionFunc();
        line(QUESTION_MSG, $question);
        $userMessage = prompt(YOUR_ANSWER_MSG);
        if ($userMessage == $ans) {
            line(CORRECT_MSG);
        } else {
            line(FAIL_GEME_MSG, $userMessage, $ans);
            line(TRY_AGAIN_MSG, $userName);
            return;
        }
    }
    line(CONGRATULATIONS_MSG, $userName);
}
