<?php


namespace Brain\Games\Progression;

use Brain\Games\Engine;

/**
 * Class Game
 * @package Brain\Games\Progression
 */
class Game extends Engine
{
    protected string $gameRulesMsg = "What number is missing in the progression?";

    protected int $minNumbersCountInExpression = 5;

    protected int $maxNumbersCountInExpression = 10;
    protected int $numbersFrom = 1;

    protected int $stepSizeFrom = 2;
    protected int $stepSizeTo = 5;
    protected string $replacementString = "..";

    protected int $hiddenPosition = 0;
    protected array $numbers = [];

    /**
     * @return bool
     */
    protected function gameRound(): bool
    {
        $expression = $this->getExpression();

        $expected = $this->calculateAnswerValue();

        $this->showQuestion($expression);
        $ans = $this->askAnswer();

        return $this->processAnswer($expected, $ans);
    }

    /**
     * Example: "5 7 9 11 13 .. 17 19 21 23"
     * @return string
     */
    protected function getExpression(): string
    {
        $len = rand($this->minNumbersCountInExpression, $this->maxNumbersCountInExpression);
        $step = rand($this->stepSizeFrom, $this->stepSizeTo);
        $numbers = range($this->numbersFrom, $step * $len, $step);
        $this->numbers = $numbers;
        $this->hiddenPosition = rand(0, count($numbers)-1);
        $numbers[$this->hiddenPosition] = $this->replacementString;

        return implode(" ", $numbers);
    }

    /**
     * @return int
     */
    protected function calculateAnswerValue(): int
    {
        return $this->numbers[$this->hiddenPosition];
    }
}
