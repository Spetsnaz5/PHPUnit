<?php

use PHPUnit\Framework\TestCase;

class IsListTest extends TestCase
{
    public function testIndexedArrayIsList(): void
    {
        $list = ['apple', 'banana', 'cherry'];
        $this->assertIsList($list);
    }

    public function testEmptyArrayIsList(): void
    {
        $this->assertIsList([]);
    }

    public function testAssociativeArrayIsNotList(): void
    {
        $assoc = ['a' => 1, 'b' => 2];
        // 失敗
        $this->assertIsList($assoc);
    }

    public function testNonSequentialKeysIsNotList(): void
    {
        $nonList = [0 => 'a', 2 => 'b'];
        // 失敗
        $this->assertIsList($nonList);
    }
}
