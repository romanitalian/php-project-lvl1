<?php


namespace Brain\Games\Even;

use Brain\Games\Cli;
use function cli\line;
use function cli\prompt;

/**
 * Class Quiz
 * @package Brain\Games\Even
 */
class Quiz extends Cli
{
    const NUMBER_MAX = 100;

    protected int $askCount = 3;
    protected int $correctAnswersCounter = 0;
    protected string $gameRulesMsg = 'Answer "yes" if the number is even, otherwise answer "no".';
    protected string $questionMsg = "Question: %d";
    protected string $congratulationsMsg = "Congratulations, %s!";
    protected string $failGameMsg = "'%s' is wrong answer ;(. Correct answer was '%s'.";
    protected string $cheerUpMsg = "Let's try again, %s!";
    protected string $isEvenAnswer = "yes";
    protected string $isNotEvenAnswer = "no";

    /**
     *
     */
    public function start()
    {
        $this->sayWelcome();
        $this->askUserName();
        $this->showGameRules();

        for ($i = 0; $i < $this->askCount; $i++) {
            if (!$this->gameRound()) {
                break;
            }
        }
        if ($this->correctAnswersCounter >= $this->askCount) {
            $this->showCongratulations();
        }
    }

    /**
     * @return bool
     */
    protected function gameRound(): bool
    {
        $val = $this->getNumber();
        $this->showQuestionNumber($val);
        $expected = $this->isCorrect($val) ? $this->isEvenAnswer : $this->isNotEvenAnswer;
        $ans = $this->askAnswer();

        if ($ans == $expected) {
            $this->showCorrect();
            $this->correctAnswersCounter++;
        } else {
            $this->showFailGame($ans, $expected);
            return false;
        }

        return true;
    }


    /**
     *
     */
    protected function showGameRules()
    {
        line($this->gameRulesMsg);
    }

    /**
     * @return string
     */
    protected function askAnswer(): string
    {
        $ans = prompt("Your answer");

        return trim(mb_strtolower($ans));
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
     *
     */
    protected function showCongratulations()
    {
        line($this->congratulationsMsg, $this->userName);
    }

    /**
     * @param string $ans
     * @param string $expected
     */
    protected function showFailGame(string $ans, string $expected)
    {
        line($this->failGameMsg, $ans, $expected);
        line($this->cheerUpMsg, $this->userName);
    }

    /**
     *
     */
    protected function showCorrect()
    {
        line("Correct!");
    }

    /**
     * @param int $val
     */
    protected function showQuestionNumber(int $val)
    {
        line($this->questionMsg, $val);
    }

    /**
     * @return int
     */
    private function getNumber()
    {
        return rand(0, static::NUMBER_MAX);
    }
}
