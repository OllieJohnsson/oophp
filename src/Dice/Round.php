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
        $this->dices = $dices;
    }




    public function play() : void
    {
        $this->lastValues = [];
        foreach ($this->dices as $dice) {
            $this->lastValues[]= $dice->roll();
        }
        $this->score += array_sum($this->lastValues);
    }




    // private function lose() : void
    // {
    //     echo "LOST ROUND";
    //     // $this->nextPlayer();
    // }





    public function getScore() : int
    {
        return $this->score;
    }

    public function getLastValues() : array
    {
        return $this->lastValues;
    }
}
