<?php

namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Player test class.
 */
class PlayerTest extends TestCase
{

    /**
     * Asserts that roll() returns an array.
     */
    public function testRoll()
    {
        $player = new Player("Kalle", [new Dice()]);
        $res = $player->roll(1);

        $this->assertInternalType("array", $res);
    }

    /**
     * Asserts that $round is of type Round after startNewRound() is called.
     */
    public function testStartNewRound()
    {
        $player = new Player("Kalle", [new Dice()]);
        $player->startNewRound();
        $res = $player->getRound();
        $exp = Round::class;

        $this->assertInstanceOf($exp, $res);
    }


    /**
     * Asserts that histogram serie gets updated with correct number of values when round is played.
     */
    public function testPlay()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);
        $player->startNewRound();
        $player->play();

        $res = count($player->getRound()->getSerie());
        $exp = 2;

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that player score is updated after save() is called.
     */
    public function testSave()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);
        $player->startNewRound();

        $player->getRound()->setScore(20);
        $player->save();

        $res = $player->getScore();
        $exp = 20;

        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that last value is the same as value in graphics string.
     */
    public function testGetLastGraphics()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);
        $player->startNewRound();
        $player->play();

        $res = substr($player->getLastGraphics()[0], -1);
        $exp = $player->getLastValues()[0];

        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that getLastScore() returns an integer.
     */
    public function testGetLastScore()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);
        $player->startNewRound();
        $player->play();

        $res = $player->getLastScore();
        $exp = "int";

        $this->assertInternalType($exp, $res);
    }

    /**
     * Asserts that getName() returns a string.
     */
    public function testGetName()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);

        $res = $player->getName();
        $exp = "string";

        $this->assertInternalType($exp, $res);
    }
}
