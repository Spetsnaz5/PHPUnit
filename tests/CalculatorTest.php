<?php

use PHPUnit\Framework\TestCase;
use src\Calculator;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $this->assertEquals(5, $calc->add(2, 3));
    }

    public function testDivide()
    {
        $calc = new Calculator();
        $this->assertEquals(2, $calc->divide(6, 3));
    }

    public function testDivideByZero()
    {
        $this->expectException(InvalidArgumentException::class);
        $calc = new Calculator();
        $calc->divide(5, 0);
    }
}
