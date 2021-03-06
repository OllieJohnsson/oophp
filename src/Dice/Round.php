<?php
namespace Oliver\Dice;

/**
 *
 */
class Round implements HistogramInterface
{
    use HistogramTrait;

    private $score = 0;
    private $isLost = false;


    public function didPlayerLose(array $lastValues)
    {
        if (in_array(1, $lastValues)) {
            $this->lose();
        } else {
            $this->score += array_sum($lastValues);
        }
    }


    public function lose()
    {
        $this->isLost = true;
        $this->score = 0;
    }

    public function getScore() : int
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function isRoundLost() : bool
    {
        return $this->isLost;
    }
}
