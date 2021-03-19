<?php


namespace Brain\Games;

use Brain\Cli;
use function cli\line;
use function cli\prompt;

abstract class Engine extends Cli implements GameInterface
{
    const MAX_RANDOM_NUMBER_IN_QUESTION = 100;

    protected string $yesAnswer = "yes";
    protected string $noAnswer = "no";

    protected int $askCount = 3;
    protected int $correctAnswersCounter = 0;
    protected string $gameRulesMsg = 'Game Rules';
    protected string $questionMsg = "Question: %s";
    protected string $askAnswerMsg = "Your answer";
    protected string $congratulationsMsg = "Congratulations, %s!";
    protected string $failGameMsg = "'%s' is wrong answer ;(. Correct answer was '%s'.";
    protected string $cheerUpMsg = "Let's try again, %s!";
    protected string $correctMsg = "Correct!";

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
     * @return string
     */
    abstract protected function getExpression(): string;

    /**
     *
     */
    protected function gameFlow()
    {
        for ($i = 0; $i < $this->askCount; $i++) {
            $isAnswerCorrect = $this->gameRound();
            if (!$isAnswerCorrect) {
                break;
            }
        }
        if ($this->correctAnswersCounter >= $this->askCount) {
            $this->showCongratulations();
        }
    }

    /**
     * Game flow
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
     * @param $expected
     * @param $ans
     * @return bool
     */
    protected function processAnswer($expected, $ans): bool
    {
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
     * @return string
     */
    protected function askAnswer(): string
    {
        $ans = prompt($this->askAnswerMsg);

        return trim(mb_strtolower($ans));
    }

    /**
     *
     */
    protected function showGameRules()
    {
        line($this->gameRulesMsg);
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
        line($this->correctMsg);
    }

    /**
     * @param $val
     */
    protected function showQuestion($val)
    {
        line($this->questionMsg, $val);
    }
}
