<?php

namespace Oliver\Guess;

use PHPUnit\Framework\TestCase;

/**
* Test cases for class Guess.
*/
class GuessMakeGuessTest extends TestCase
{
    /**
    * Run makeGuess() with a value higher than $number
    */
    public function testMakeGuessTooHigh()
    {
        $guess = new Guess(40);
        $this->assertInstanceOf("\Oliver\Guess\Guess", $guess);
        $guessedNumber = 50;

        $res = $guess->makeGuess($guessedNumber);
        $exp = "Your guess {$guessedNumber} is <b>too high...</b>";
        $this->assertEquals($exp, $res);
    }

    /**
    * Run makeGuess() with a value lower than $number
    */
    public function testMakeGuessTooLow()
    {
        $guess = new Guess(40);
        $this->assertInstanceOf("\Oliver\Guess\Guess", $guess);
        $guessedNumber = 20;

        $res = $guess->makeGuess($guessedNumber);
        $exp = "Your guess {$guessedNumber} is <b>too low...</b>";
        $this->assertEquals($exp, $res);
    }

    /**
    * Run makeGuess() with a value that is equal to $number
    */
    public function testMakeGuessCorrect()
    {
        $guess = new Guess(40);
        $this->assertInstanceOf("\Oliver\Guess\Guess", $guess);
        $guessedNumber = 40;

        $res = $guess->makeGuess($guessedNumber);
        $exp = "Your guess {$guessedNumber} is <b>correct!</b>";
        $this->assertEquals($exp, $res);
    }

    /**
    * Run makeGuess() when out of tries
    */
    public function testMakeGuessNoMoreTries()
    {
        $correctNumber = 40;
        $guess = new Guess($correctNumber, 0);
        $this->assertInstanceOf("\Oliver\Guess\Guess", $guess);
        $guessedNumber = 30;

        $res = $guess->makeGuess($guessedNumber);
        $exp = "You lose! I was thinking of <b>{$correctNumber}</b>.";
        $this->assertEquals($exp, $res);
    }
}
