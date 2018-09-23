<?php

namespace Oliver\Guess;

use PHPUnit\Framework\TestCase;

/**
* Test cases for class Guess.
*/
class GuessExceptionTest extends TestCase
{
    /**
    * Verify that GuessException is thrown when guess is more than 100
    */
    public function testMakeGuessTooHigh()
    {
        $this->expectException(GuessException::class);

        $guess = new Guess();
        $this->assertInstanceOf("\Oliver\Guess\Guess", $guess);
        $guess->makeGuess(140);
    }
    
    /**
    * Verify that GuessException is thrown when guess is less than 1
    */
    public function testMakeGuessTooLow()
    {
        $this->expectException(GuessException::class);

        $guess = new Guess();
        $this->assertInstanceOf("\Oliver\Guess\Guess", $guess);
        $guess->makeGuess(0);
    }

    /**
    * Verify that GuessException is thrown when guess is empty
    */
    public function testMakeGuessEmpty()
    {
        $this->expectException(GuessException::class);

        $guess = new Guess();
        $this->assertInstanceOf("\Oliver\Guess\Guess", $guess);
        $guess->makeGuess("");
    }
}
