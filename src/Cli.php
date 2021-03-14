<?php

namespace Brain;

use function cli\line;
use function cli\prompt;

/**
 * Class Cli
 * @package Brain\Games\Cli
 */
class Cli
{
    protected const WELCOME_TO_THE_BRAIN_GAME = 'Welcome to the Brain Games!';
    protected const ASK_NAME = 'May I have your name?';
    protected string $userName;

    public function start()
    {
        $this->sayWelcome();
        $this->askUserName();
        $this->sayHello();
    }

    /**
     *
     */
    protected function sayWelcome()
    {
        line(static::WELCOME_TO_THE_BRAIN_GAME);
    }

    /**
     *
     */
    protected function sayHello()
    {
        line("Hello, %s!", $this->userName);
    }

    /**
     * @return string
     */
    protected function askUserName()
    {
        $this->userName = prompt(static::ASK_NAME);
    }
}
