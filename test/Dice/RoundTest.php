<?php

namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Player test class.
 */
class RoundTest extends TestCase
{
    /**
     * Asserts that isRoundLost() returns true if player rolled a 1.
     */
    public function testPlayerLost()
    {
        $round = new Round();
        $round->didPlayerLose([1, 2, 3]);

        $res = $round->isRoundLost();
        $exp = true;

        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that isRoundLost() returns false if player didn't roll a 1.
     */
    public function testPlayerDidntLose()
    {
        $round = new Round();
        $round->didPlayerLose([5, 2, 3]);

        $res = $round->isRoundLost();
        $exp = false;

        $this->assertEquals($exp, $res);
    }

    /**
     * Asserts that getScore() returns an integer.
     */
    public function testScoreIsInt()
    {
        $round = new Round();

        $res = $round->getScore();
        $exp = "int";

        $this->assertInternalType($exp, $res);
    }
}
