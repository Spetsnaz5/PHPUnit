<?php

use PHPUnit\Framework\TestCase;

final class SameTest extends TestCase
{

    public function testSameInteger()
    {
        $this->assertSame(1, 1);
    }

    public function testSameString()
    {
        $this->assertSame('abc', 'abc');
    }

    public function testSameBoolean()
    {
        $this->assertSame(true, true);
    }

    public function testIntegerNotSameAsString()
    {
        //失敗
        $this->assertSame(1, '1');
    }

    public function testBooleanNotSameAsInteger()
    {
        //失敗
        $this->assertSame(true, 1);
    }

    public function testArrayNotSameAsBoolean()
    {
        //失敗
        $this->assertSame([], false);
    }

    public function testArrayNotSameAsArray()
    {
        //失敗
        $this->assertSame([1, 3, 2], [1, 2, 3]);
    }

    public function testArraySameArray()
    {
        $this->assertSame([1, 2, 3], [1, 2, 3]);
    }
}
