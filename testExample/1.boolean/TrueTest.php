<?php

use PHPUnit\Framework\TestCase;

final class TrueTest extends TestCase
{
    public function testTrue()
    {
        $this->assertTrue(true);
    }

    public function testOneIsNotTrue()
    {
        //失敗
        $this->assertTrue(1);
    }

    public function testComparisonIsTrue()
    {
        $this->assertTrue(2 > 1);
    }

    public function testFalseIsNotTrue()
    {
        //失敗
        $this->assertTrue(false);
    }
}
