<?php


namespace Brain\Games\Gcd;

use Brain\Games\Engine;

/**
 * Class Game
 * @package Brain\Games\Gcd
 */
class Game extends Engine
{
    protected string $gameRulesMsg = "Find the greatest common divisor of given numbers.";
    protected array $vals = [];

    /**
     * Start the Game!
     */
    public function start()
    {
        parent::start();

        $this->showGameRules();
        $this->gameFlow();
    }

    /**
     * Core part of The Game.
     * @return bool
     */
    protected function gameRound(): bool
    {
        $expression = $this->getExpression();
        $expected = $this->calculateAnswerValue($expression);

        $this->showQuestion($expression);
        $ans = $this->askAnswer();

        return $this->processAnswer($expected, $ans);
    }

    /**
     * @param $expression
     * @return int
     */
    protected function calculateAnswerValue($expression): int
    {
        $gcd = gmp_gcd(...$this->vals);

        return (int)$gcd;
    }

    /**
     * @return string
     */
    protected function getExpression(): string
    {
        $this->vals = [];
        $this->vals[] = rand(0, static::MAX_RANDOM_NUMBER_IN_QUESTION);
        $this->vals[] = rand(1, static::MAX_RANDOM_NUMBER_IN_QUESTION);

        return implode(" ", $this->vals);
    }
}
