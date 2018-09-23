<?php

namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Player test class.
 */
class RoundTest extends TestCase
{

    /**
     * Asserts that score is 0 on construct.
     */
    public function testScoreIs0()
    {
        $game = new Game();
        $game->startNewRound();

        $res = $game->getRound()->getScore();
        $exp = 0;

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that lastValues has correct number of values.
     */
    public function testCorrectNumberOfLastValues()
    {
        $game = new Game();
        $game->startNewRound();
        $game->getRound()->play();

        $res = count($game->getRound()->getLastValues());
        $exp = count($game->getDices());

        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that score gets updated when there is no 1 in lastValues.
     */
    public function testScoreGetsUpdated()
    {
        $game = new Game();
        $game->startNewRound();

        $values = [2, 2 ,6, 3, 5];
        $game->getRound()->isThereAOne($values);
        $res = $game->getRound()->getScore();
        $exp = 18;

        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that score is set to 0 when $values contains a 1.
     */
    public function testScoreIsSetTo0()
    {
        $game = new Game();
        $game->startNewRound();

        $values = [1, 2 ,6, 3, 5];
        $game->getRound()->isThereAOne($values);
        $res = $game->getRound()->getScore();
        $exp = 0;

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that correct number of values is returned from getLastGraphics().
     */
    public function testGetLastGraphics()
    {
        $game = new Game();
        $game->startNewRound();
        $game->getRound()->play();

        $res = count($game->getRound()->getLastGraphics());
        $exp = count($game->getDices());

        $this->assertEquals($exp, $res);
    }



    /**
     * Asserts that getLastScore() returns an integer.
     */
    public function testGetLastScore()
    {
        $game = new Game();
        $game->startNewRound();
        $game->getRound()->play();

        $res = $game->getRound()->getLastScore();
        $exp = 'int';

        $this->assertInternalType($exp, $res);
    }
}
