<?php

use PHPUnit\Framework\TestCase;

final class ContainsTest extends TestCase
{

    public function testContainsValueInArray()
    {
        $this->assertContains('apple', ['banana', 'apple', 'cherry']);
    }

    public function testContainsIntegerInArray()
    {
        $this->assertContains(42, [10, 20, 42]);
    }

    public function testContainsFailsWhenValueMissing()
    {
        //失敗
        $this->assertContains('orange', ['apple', 'banana']);
    }
}
