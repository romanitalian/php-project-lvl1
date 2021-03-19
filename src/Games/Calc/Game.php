<?php


namespace Brain\Games\Calc;

use Brain\Games\Engine;
use Matex\Evaluator;

/**
 * Class Quiz
 * @package Brain\Games\Even
 */
class Game extends Engine
{
    protected int $askCount = 3;
    protected int $correctAnswersCounter = 0;
    protected string $gameRulesMsg = 'What is the result of the expression?';
    protected string $questionMsg = "Question: %s";

    protected string $congratulationsMsg = "Congratulations, %s!";
    protected string $failGameMsg = "'%s' is wrong answer ;(. Correct answer was '%s'.";
    protected string $cheerUpMsg = "Let's try again, %s!";
    protected Evaluator $evaluator;
    protected array $operationsDict = ["+", "-", "*"];
    private string $operationDefault = "+";

    /**
     * Start the Game!
     */
    public function start()
    {
        $this->setEvaluator();
        parent::start();
    }

    /**
     * Set Math evalucator - order to calculate our math question expression.
     */
    protected function setEvaluator()
    {
        $this->evaluator = new Evaluator();
    }

    /**
     * @param $expression
     * @return false|float|mixed|string
     * @throws \Matex\Exception
     */
    protected function calculateAnswerValue($expression)
    {
        return $this->evaluator->execute($expression);
    }

    /**
     * @return string
     */
    protected function getExpression(): string
    {
        $valFirst = rand(0, static::MAX_RANDOM_NUMBER_IN_QUESTION);
        $valSecond = rand(1, static::MAX_RANDOM_NUMBER_IN_QUESTION);
        $operationKey = array_rand($this->operationsDict, 1);
        $operation = $this->operationsDict[$operationKey] ?? $this->operationDefault;

        return "$valFirst $operation $valSecond";
    }
}
