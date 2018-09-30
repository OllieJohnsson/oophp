<?php
namespace Oliver\Dice;

/**
 *
 */
class Game
{
    private $players = [];
    private $dices = [];
    private $goal;
    private $turn;
    private $message = "";
    private $winner;

    public function __construct(int $dices = 5, int $goal = 100)
    {
        $this->goal = $goal;
        $this->addDice($dices);
    }

    public function addDice(int $amount)
    {
        for ($i=0; $i < $amount; $i++) {
            $this->dices[] = new Dice();
        }
    }


    public function addPlayers(string $name)
    {
        if (!$name) {
            throw new NoNameException("Du måste skriva in ett namn...");
        }
        $player1 = new Player("Dator", $this->dices);
        $player2 = new Player($name, $this->dices);
        $this->players = [$player1, $player2];
    }


    public function rollWhoStarts()
    {
        foreach ($this->players as $player) {
            $results[] = array_sum($player->roll(1));
        }
        $this->turn = array_keys($results, max($results))[0];
    }


    public function nextPlayer(int $current) : int
    {
        $this->reachedGoal($this->getCurrentPlayer()->getScore());
        return $this->turn = $current >= (count($this->players) - 1) ? 0 : $current+1;
    }


    public function shouldComputerPlay(int $opponentScore, int $computerScore, int $roundScore) : bool
    {
        $playConditions = ($opponentScore >= 90 && $computerScore < 80) ||
            ($opponentScore < 40 && $computerScore > 60) ||
            ($opponentScore < 40 && $computerScore < 40);
        $saveConditions = $roundScore >= 40;

        return $playConditions && !$saveConditions ? true : false;
    }

    public function autoPlay()
    {
        $computer = $this->getCurrentPlayer();
        $computerScore = $computer->getScore();
        $opponentScore = $this->getPlayer(1)->getScore();

        $computer->startNewRound();
        $computer->play();

        while (!$computer->getRound()->isRoundLost()) {
            $roundScore = $computer->getRound()->getScore();
            if ($this->shouldComputerPlay($opponentScore, $computerScore, $roundScore)) {
                $computer->play();
            } else {
                $this->message = "Datorn fick <b>".$computer->getRound()->getScore().
                    "</b> poäng!";
                $computer->save();
                break;
            }
        }

        if ($computer->getRound()->isRoundLost()) {
            $this->message = "Datorn fick inga poäng!";
        }
        $this->nextPlayer($this->turn);
    }


    public function reachedGoal(int $score) : void
    {
        if ($score >= $this->goal) {
            $this->winner = $this->getCurrentPlayer();
        }
    }


    public function getPlayer(int $index) : object
    {
        return $this->players[$index];
    }

    public function getCurrentPlayer() : object
    {
        return $this->players[$this->turn];
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function setMessage(string $message) : void
    {
        $this->message = $message;
    }

    public function getPlayers() : array
    {
        return $this->players;
    }

    public function getTurn() : int
    {
        return $this->turn;
    }

    public function getWinner() : ?Player
    {
        return $this->winner;
    }
}
