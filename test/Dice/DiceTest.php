<?php

// namespace Anax;
namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class DiceTest extends TestCase
{
    /**
     * Asserts that roll() returns an integer.
     */
    public function testRollReturnsInt()
    {
        $dice = new Dice();
        $res = $dice->roll();
        $this->assertInternalType('int', $res);
    }
}
