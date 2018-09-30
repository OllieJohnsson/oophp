<?php
namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * HistogramTrait test class.
 */
class HistogramTraitTest extends TestCase
{
    /**
     * Asserts that getHistogramSerie() returns array with correct number of values.
     */
    public function testGetHistogramSerie()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);
        $player->startNewRound();
        $player->play();

        $res = count($player->getRound()->getHistogramSerie());
        $exp = 2;

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that getHistogramMin() returns 1.
     */
    public function testGetHistogramMin()
    {
        $round = new Round();

        $exp = 1;
        $res = $round->getHistogramMin();

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts that getHistogramMax() returns an integer.
     */
    public function testGetHistogramMax()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);
        $player->startNewRound();
        $player->play();

        $exp = "int";
        $res = $player->getRound()->getHistogramMax();

        $this->assertInternalType($exp, $res);
    }


    /**
     * Asserts that printHistogram() returns a string containing both min and max numbers.
     */
    public function testPrintHistogram()
    {
        $player = new Player("Kalle", [new Dice(), new Dice()]);
        $player->startNewRound();
        $player->play();

        $res = $player->getRound()->printHistogram(1, 6);

        $this->assertContains("1: ", $res);
        $this->assertContains("6: ", $res);
    }
}
