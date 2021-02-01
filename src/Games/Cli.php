<?php


namespace Brain\Games;

require_once __DIR__ . "/../../vendor/autoload.php";

use function cli\line;
use function cli\prompt;

/**
 * Class Cli
 * @package Brain\Games\Cli
 */
class Cli
{
    const WelcomeSentence = 'Welcome to the Brain Game!';
    const GetNamePrompt = 'May I have your name?';

    public function Start()
    {
        $this->sayWelcome();
        $this->AskNameAndSayHello();
    }

    protected function sayWelcome()
    {
        line(static::WelcomeSentence);
    }

    protected function AskNameAndSayHello()
    {
        line("Hello, %s!", $this->askUserName());
    }

    /**
     * @return string
     */
    protected function askUserName()
    {
        return prompt(static::GetNamePrompt);
    }
}
