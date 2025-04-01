<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use PHPUnit\Framework\TestCase;
use Deg540\DockerPHPBoilerplate\FizzBuzzKata;

class FizzBuzzKataTest extends TestCase
{
    private FizzBuzzKata $fizzBuzz;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fizzBuzz = new FizzBuzzKata();
    }

    /**
    * @test
    */
    public function multipleOfThreeReturnsFizz(): void
    {
        $result = $this->fizzBuzz->convert(3);

        $this->assertEquals('Fizz', $result);
    }

    /**
    * @test
    */
    public function multipleOfFiveReturnsBuzz(): void
    {
        $result = $this->fizzBuzz->convert(5);

        $this->assertEquals('Buzz', $result);
    }

    /**
     * @test
     */
    public function notMultipleOfThreeOrFiveReturnNumber(): void
    {
        $result = $this->fizzBuzz->convert(1);

        $this->assertEquals(1, $result);
    }

    /**
     * @test
     */
    public function notMultipleOfThreeAndFiveReturnNumber(): void
    {
        $result = $this->fizzBuzz->convert(15);

        $this->assertEquals('FizzBuzz', $result);
    }
}