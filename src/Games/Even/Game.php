<?php


namespace Brain\Games\Even;

use Brain\Games\Engine;
use function cli\line;

/**
 * Class Quiz
 * @package Brain\Games\Even
 */
class Game extends Engine
{
    const MAX_RANDOM_NUMBER_IN_QUESTION = 100;

    protected string $gameRulesMsg = 'Answer "yes" if the number is even, otherwise answer "no".';
    private string $isEvenAnswer = "yes";
    private string $isNotEvenAnswer = "no";

    /**
     * Start the Game!
     */
    public function start()
    {
        parent::start();

        // Answer "yes" if the number is even, otherwise answer "no".
        $this->showGameRules();
        $this->gameFlow();
    }

    /**
     * @return bool
     */
    protected function gameRound(): bool
    {
        $expression = $this->getExpression();
        $this->showQuestion($expression);
        $ans = $this->askAnswer();

        $isCorrect = $this->isCorrect((int)$expression);
        $expected = $isCorrect ? $this->isEvenAnswer : $this->isNotEvenAnswer;

        return $this->processAnswer($expected, $ans);
    }

    /**
     *
     */
    protected function showGameRules()
    {
        line($this->gameRulesMsg);
    }

    /**
     * @param $number
     * @return bool
     */
    protected function isCorrect($number): bool
    {
        return is_int($number) ? $number % 2 == 0 : false;
    }


    /**
     * @return string
     */
    protected function getExpression(): string
    {
        return (string)rand(0, static::MAX_RANDOM_NUMBER_IN_QUESTION);
    }
}
