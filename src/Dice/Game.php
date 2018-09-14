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

    private $winner;
    private $currentPlayerIndex;

    private $message = "";


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
            $player->setValues([$value]);

            if ($value > $maxVal) {
                $maxVal = $value;
                $this->currentPlayerIndex = $index;
            }
        }
    }



    private function nextPlayer() : void
    {
        $this->currentPlayerIndex += 1;
        if ($this->currentPlayerIndex > count($this->players) - 1) {
            $this->currentPlayerIndex = 0;
        }
    }



    public function startNewRound() : void
    {
        $this->getCurrentPlayer()->setRound($this->dices);
    }


    public function playRound()
    {
        echo "play round";
        $this->getCurrentPlayer()->getRound()->play();
        $this->getCurrentPlayer()->setValues($this->getCurrentPlayer()->getRound()->getLastValues());

        if (in_array(1, $this->getCurrentPlayer()->getLastValues())) {
            echo "contains 1";
            $this->endCurrentRound();
            return;
        }

    }


    public function endCurrentRound() : void
    {
        $this->getCurrentPlayer()->updateScore($this->getCurrentPlayer()->getRound()->getScore());
        $this->getCurrentPlayer()->deleteRound();

        if ($this->getCurrentPlayer()->getScore() >= $this->goal) {
            $this->winner = $this->getCurrentPlayer();
            return;
        }
        $this->nextPlayer();
    }


    public function getPlayers() : array
    {
        return $this->players;
    }

    public function getCurrentPlayer() : object
    {
        return $this->players[$this->currentPlayerIndex];
    }

    public function setMessage(string $message) : void
    {
        $this->message = $message;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function getWinner()
    {
        return $this->winner;
    }
}
