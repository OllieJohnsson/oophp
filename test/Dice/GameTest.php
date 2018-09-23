<?php

// namespace Anax;
namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class GameTest extends TestCase
{
    /**
     * Asserts that there are two players after running addPlayers().
     */
    public function testNumberOfPlayers()
    {
        $game = new Game();
        $game->addPlayers("Kalle");

        $res = count($game->getPlayers());
        $exp = 2;

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that $currentPlayerIndex is less than the number of players.
     */
    public function testCurrentPlayerIndexIsLessThanNumberOfPlayers()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();

        $res = $game->getCurrentPlayerIndex();
        $exp = count($game->getPlayers());
        $this->assertLessThan($exp, $res);
    }


    /**
     * Asserts that $currentPlayerIndex is 1 if previous value was 0.
     */
    public function testCurrentPlayerIndexIncreasesAfterNextPlayer()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->nextPlayer(0);

        $res = $game->getCurrentPlayerIndex();
        $exp = 1;
        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that $currentPlayerIndex is 0 if previous value was 1 or more.
     */
    public function testCurrentPlayerIndexIs0AfterNextPlayer()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->nextPlayer(5);

        $res = $game->getCurrentPlayerIndex();
        $exp = 0;
        $this->assertEquals($exp, $res);
    }



    /**
     * Asserts that $currentPlayerIndex is changed after computer played a round.
     */
    public function testIsComputerPlaying()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->setCurrentPlayerIndex(0);
        $game->isComputerPlaying();

        $res = $game->getCurrentPlayerIndex();
        $exp = 1;

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that $round is set to null after game is saved.
     */
    public function testRoundIsNullAfterSaveRound()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->startNewRound();
        $game->getRound()->play();
        $game->saveRound();

        $res = $game->getRound();
        $this->assertNull($res);
    }


    /**
     * Asserts that $winner is set to a player when reachedGoal() is called and the current
     * players score is more than or equal to $goal.
     */
    public function testReachedGoal()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->reachedGoal(120);

        $res = $game->getWinner();
        $exp = Player::class;
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Asserts that $winner has no value when reachedGoal() is called and the current
     * players score is less than $goal.
     */
    public function testDidntReachGoal()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->reachedGoal(80);

        $res = $game->getWinner();
        $this->assertNull($res);
    }


    /**
     * Asserts that $round has no value after loseRound() is called.
     */
    public function testLoseRound()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->startNewRound();
        $game->getRound()->play();
        $game->loseRound();

        $res = $game->getRound();
        $this->assertNull($res);
    }


    /**
     * Asserts that $message is of type string after setMessage is called.
     */
    public function testMessage()
    {
        $game = new Game();
        $game->setMessage("error");

        $res = $game->getMessage();
        $exp = 'string';
        $this->assertInternalType($exp, $res);
    }
}
