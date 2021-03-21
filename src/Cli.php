<?php

namespace Brain\Cli;

use function cli\line;
use function cli\prompt;

define('RULE_GAME', 'Welcome to the Brain Game!');
define('ASK_NAME_MSG', 'May I have your name?');
define('HELLO_MSG', 'Hello, %s!');

function run()
{
    line(RULE_GAME);
    line(HELLO_MSG, prompt(ASK_NAME_MSG));
}
