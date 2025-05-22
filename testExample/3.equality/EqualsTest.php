<?php

use PHPUnit\Framework\TestCase;

final class EqualsTest extends TestCase
{
    public function testEqualsWithSameInteger()
    {
        $this->assertEquals(1, 1);
    }

    public function testEqualsWithIntegerAndString()
    {
        $this->assertEquals(1, '1');
    }

    public function testEqualsWithBooleanTrueAndInteger()
    {
        $this->assertEquals(true, 1);
    }

    public function testEqualsWithBooleanFalseAndIntegerZero()
    {
        $this->assertEquals(0, false);
    }

    public function testEqualsWithNullAndEmptyString()
    {
        $this->assertEquals(null, '');
    }

    public function testEqualsWithSameArray()
    {
        $this->assertEquals([1], [1]);
    }

    public function testEqualsFailsWithDifferentIntegers()
    {
        //失敗
        $this->assertEquals(1, 2);
    }

    public function testEqualsWithIntegerAndStringInsideArray()
    {
        $this->assertEquals([1], ['1']);
    }

    public function testEqualsFailsWithArray()
    {
        //失敗 有序
        $this->assertEquals([1, 2, 3], [1, 3, 2]);
    }
}
