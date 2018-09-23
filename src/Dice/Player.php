<?php
namespace Oliver\Dice;

/**
 *
 */
class Player
{
    private $name;
    private $score = 0;
    private $firstRoll;

    public function __construct(string $playerName)
    {
        $this->name = $playerName;
    }



    public function setFirstRoll(int $value) : void
    {
        $this->firstRoll = $value;
    }

    public function getFirstGraphic() : string
    {
        return "dice-" . $this->firstRoll;
    }

    public function getName() : string
    {
        return $this->name;
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
