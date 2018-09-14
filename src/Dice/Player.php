<?php
namespace Oliver\Dice;

/**
 *
 */
class Player
{
    private $name;
    private $score = 0;
    private $lastValues = [];
    private $round;

    public function __construct(string $playerName)
    {
        $this->name = $playerName;
    }


    public function setRound(array $dices) :void
    {
        $this->round = new Round($dices);
    }

    public function getRound()
    {
        return $this->round;
    }

    public function deleteRound()
    {
        $this->round = null;
    }


    // public function playRound()
    // {
    //     $values = $this->round->play();
    //     $this->setValues($values);
    // }



    public function setValues(array $values)
    {
        $this->lastValues = $values;
    }



    public function getName() : string
    {
        return $this->name;
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



    public function updateScore(int $score) : void
    {
        $this->score += $score;
    }

    public function getScore() : int
    {
        return $this->score;
    }
}
