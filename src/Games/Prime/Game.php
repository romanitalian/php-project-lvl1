<?php


namespace Brain\Games\Prime;

use Brain\Games\Engine;

/**
 * Class Game
 * @package Brain\Games\Prime
 */
class Game extends Engine
{
    protected string $gameRulesMsg = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    protected int $numberFrom = 0;
    protected int $numberTo = 100;
    protected int $numberValue = 0;

    /**
     * @return string
     */
    protected function getExpression(): string
    {
        $this->numberValue = rand($this->numberFrom, $this->numberTo);

        return $this->numberValue;
    }

    /**
     * @param int $num
     * @return bool
     */
    protected function isPrime(int $num)
    {
        if ($num == 2) {
            return true;
        }
        if ($num == 1 || $num % 2 == 0) {
            return false;
        }
        $to = sqrt($num) + 1;
        for ($i = 3; $i <= $to; $i += 2) {
            if ($num % $i == 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return string
     */
    protected function calculateAnswerValue(): string
    {
        return $this->isPrime($this->numberValue) ? $this->yesAnswer : $this->noAnswer;
    }
}
