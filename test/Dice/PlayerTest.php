<?php

namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Player test class.
 */
class PlayerTest extends TestCase
{
    /**
     * Asserts that return value of getFirstGraphic() is correct.
     */
    public function testGetFirstGraphic()
    {
        $player = new Player('Kalle');
        $player->setFirstRoll(6);

        $res = $player->getFirstGraphic();
        $exp = 'dice-6';

        $this->assertEquals($exp, $res);
    }


    /**
     * Asserts correct name is returned from getName().
     */
    public function testGetName()
    {
        $player = new Player('Kalle');

        $res = $player->getName();
        $exp = 'Kalle';

        $this->assertEquals($exp, $res);
    }



    /**
     * Asserts that score gets correct value.
     */
    public function testUpdateScore()
    {
        $player = new Player('Kalle');
        $player->updateScore(20);
        $player->updateScore(6);

        $res = $player->getScore();
        $exp = 26;

        $this->assertEquals($exp, $res);
    }
}
