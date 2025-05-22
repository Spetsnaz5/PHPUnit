<?php

use PHPUnit\Framework\TestCase;

final class ArrayHasKeyTest extends TestCase
{
    public function testArrayHasKeyWithExistingStringKey()
    {
        $data = ['name' => 'Alice', 'age' => 30];
        $this->assertArrayHasKey('name', $data);
    }

    public function testArrayHasKeyWithExistingIntegerKey()
    {
        $data = [100 => 'A', 200 => 'B'];
        $this->assertArrayHasKey(100, $data);
    }

    public function testArrayHasKeyFailsWhenKeyMissing()
    {
        $data = ['name' => 'Alice'];
        //失敗
        $this->assertArrayHasKey('email', $data);
    }

    public function testArrayHasKeyOnEmptyArray()
    {
        $data = [];
        //失敗
        $this->assertArrayHasKey('anything', $data);
    }
}
