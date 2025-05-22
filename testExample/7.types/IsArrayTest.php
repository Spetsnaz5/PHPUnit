<?php

use PHPUnit\Framework\TestCase;

class IsArrayTest extends TestCase
{
    public function testValueIsArray(): void
    {
        $data = ['apple', 'banana', 'cherry'];
        $this->assertIsArray($data);
    }

    public function testValueIsNotArray(): void
    {
        $data = 'not-an-array';
        // 失敗
        $this->assertIsArray($data);
    }

    public function testEmptyArray(): void
    {
        $data = [];
        $this->assertIsArray($data);
    }
}
