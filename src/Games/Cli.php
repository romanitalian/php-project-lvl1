<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

/**
 * Class Cli
 * @package Brain\Games\Cli
 */
class Cli
{
    private const WELCOME_TO_THE_BRAIN_GAME = 'Welcome to the Brain Game!';
    private const ASK_NAME = 'May I have your name?';

    public function start()
    {
        $this->sayWelcome();
        $this->askNameAndSayHello();
    }

    protected function sayWelcome()
    {
        line(static::WELCOME_TO_THE_BRAIN_GAME);
    }

    protected function askNameAndSayHello()
    {
        line("Hello, %s!", $this->askUserName());
    }

    /**
     * @return string
     */
    protected function askUserName()
    {
        return prompt(static::ASK_NAME);
    }
}
