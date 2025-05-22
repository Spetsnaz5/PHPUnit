<?php

use PHPUnit\Framework\TestCase;

final class FalseTest extends TestCase
{
    public function testFalse()
    {
        $this->assertFalse(false);
    }

    public function testOneIsNotFalse()
    {
        //失敗
        $this->assertFalse(1);
    }

    public function testComparisonIsFalse()
    {
        $this->assertFalse(2 < 1);
    }

    public function testTrueIsNotFalse()
    {
        //失敗
        $this->assertFalse(true);
    }
}
