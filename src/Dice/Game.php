<?php
namespace Oliver\Dice;

/**
 *
 */
class Game
{
    private $dices = [];
    private $players = [];
    private $goal;
    private $round;
    private $lastScore;
    private $currentPlayerIndex;
    private $message = "";
    private $winner;


    public function __construct(int $goal = 100, int $numberOfDices = 5)
    {
        $this->goal = $goal;
        for ($i=0; $i < $numberOfDices; $i++) {
            $this->dices[]= new Dice(6);
        }
    }

    public function addPlayers(string $playerName): void
    {
        if (!$playerName) {
            throw new NoNameException("Du måste skriva in ett namn...");
        }
        $computer = new Player("Dator");
        $player = new Player($playerName);
        $this->players = [$computer, $player];
    }

    public function rollWhoStarts() : void
    {
        $maxVal = 0;
        foreach ($this->players as $index => $player) {
            $value = $this->dices[0]->roll();
            $player->setFirstRoll($value);

            if ($value > $maxVal) {
                $maxVal = $value;
                $this->currentPlayerIndex = $index;
            }
        }
    }

    public function nextPlayer(int $index) : void
    {
        if ($index >= count($this->players) - 1) {
            $index = 0;
        } else {
            $index += 1;
        }
        $this->currentPlayerIndex = $index;
    }

    public function isComputerPlaying() : void
    {
        if ($this->getCurrentPlayer()->getName() == "Dator") {
            $this->startNewRound();
            $this->round->play();

            if ($this->getRound()->getScore() > 0) {
                $this->saveRound();
                $this->message = "Datorn fick <b>$this->lastScore</b> poäng!";
            } else {
                $this->loseRound();
                $this->message = "Datorn fick inga poäng!";
            }
        }
    }

    public function startNewRound() : void
    {
        $this->round = new Round($this->dices);
        $this->message = null;
    }

    public function saveRound() : void
    {
        $this->lastScore = $this->round->getScore();
        $this->getCurrentPlayer()->updateScore($this->lastScore);
        $this->reachedGoal($this->getCurrentPlayer()->getScore());
        $this->round = null;
        $this->nextPlayer($this->getCurrentPlayerIndex());
    }

    public function reachedGoal(int $score) : void
    {
        if ($score >= $this->goal) {
            $this->winner = $this->getCurrentPlayer();
        }
    }

    public function loseRound() : void
    {
        $this->round = null;
        $this->nextPlayer($this->getCurrentPlayerIndex());
    }



    public function getPlayers() : array
    {
        return $this->players;
    }

    public function getDices() : array
    {
        return $this->dices;
    }

    public function getCurrentPlayer() : object
    {
        return $this->players[$this->currentPlayerIndex];
    }

    public function getCurrentPlayerIndex() : int
    {
        return $this->currentPlayerIndex;
    }

    public function setCurrentPlayerIndex(int $index) : void
    {
        $this->currentPlayerIndex = $index;
    }

    public function setMessage(string $message) : void
    {
        $this->message = $message;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function getWinner() : ?Player
    {
        return $this->winner;
    }

    public function getRound() : ?Round
    {
        return $this->round;
    }
}
