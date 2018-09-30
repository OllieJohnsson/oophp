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
     * Asserts that $turn is less than the number of players.
     */
    public function testTurnIsLessThanNumberOfPlayers()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();

        $res = $game->getTurn();
        $exp = count($game->getPlayers());
        $this->assertLessThan($exp, $res);
    }


    /**
     * Asserts that $turn is 1 if previous value was 0.
     */
    public function testTurnIncreasesAfterNextPlayer()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->nextPlayer(0);

        $res = $game->getTurn();
        $exp = 1;
        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that $turn is 0 if previous value was 1 or more.
     */
    public function testTurnIs0AfterNextPlayer()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->nextPlayer(5);

        $res = $game->getTurn();
        $exp = 0;
        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that getPlayer() returns a Player object.
     */
    public function testgetPlayer()
    {
        $game = new Game();
        $game->addPlayers("Kalle");

        $res = $game->getPlayer(1);
        $exp = Player::class;
        $this->assertInstanceOf($exp, $res);
    }



    /**
     * Asserts that $turn is changed to the next player afer running autoPlay().
     */
    public function testTurnAfterAutoPlay()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->nextPlayer(20);

        $game->autoPlay();

        $res = $game->getTurn();
        $exp = 1;
        $this->assertEquals($exp, $res);
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


    /**
     * Asserts that the computer should play given these conditions.
     */
    public function testShouldComputerPlay()
    {
        $game = new Game();
        $game->addPlayers("Kalle");
        $game->rollWhoStarts();
        $game->nextPlayer(20);

        $game->getCurrentPlayer()->startNewRound();
        $res = $game->shouldComputerPlay(20, 70, 10);
        $exp = true;

        $this->assertEquals($exp, $res);
    }
}
