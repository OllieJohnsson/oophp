<?php

namespace Oliver\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Game Exception test class.
 */
class GameExceptionTest extends TestCase
{
    /**
     * Asserts that NoNameException is thrown if no player name is given.
     */
    public function testNoNameException()
    {
        $this->expectException(NoNameException::class);

        $game = new Game();
        $game->addPlayers("");
    }
}
