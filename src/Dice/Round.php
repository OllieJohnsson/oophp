<?php
namespace Oliver\Dice;

/**
 *
 */
class Round
{
    private $dices;
    private $score = 0;
    private $lastValues = [];

    public function __construct($dices)
    {
        $this->score = 0;
        $this->dices = $dices;
    }



    public function play() : void
    {
        $this->lastValues = [];
        foreach ($this->dices as $dice) {
            $this->lastValues[]= $dice->roll();
        }
        $this->isThereAOne($this->lastValues);
    }

    public function isThereAOne(array $values) : void
    {
        if (in_array(1, $values)) {
            $this->score = 0;
        } else {
            $this->score += array_sum($values);
        }
    }

    public function getScore() : int
    {
        return $this->score;
    }

    public function getLastValues() : array
    {
        return $this->lastValues;
    }

    public function getLastGraphics() : array
    {
        return array_map(function ($val) {
            return "dice-" . $val;
        }, $this->lastValues);
    }

    public function getLastScore() : int
    {
        return array_sum($this->lastValues);
    }
}
