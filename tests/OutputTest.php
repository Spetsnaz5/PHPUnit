<?php

use PHPUnit\Framework\TestCase;

/**
 * 測試輸出
 */
final class OutputTest extends TestCase
{
    public function testExpectFooActualFoo(): void
    {
        $this->expectOutputString('foo');

        print 'foo';
    }

    public function testExpectBarActualBaz(): void
    {
        $this->expectOutputString('bar');

        print 'baz';
    }

    public function testExpectOutputRegex(): void
    {
        $this->expectOutputRegex('/^A[A-Z]*[0-9]*./');

        print 'AZ12345678900-';
    }
}