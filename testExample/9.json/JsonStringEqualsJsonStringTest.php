<?php

use PHPUnit\Framework\TestCase;

class JsonStringEqualsJsonStringTest extends TestCase
{
    public function testJsonStringsAreEqual(): void
    {
        $expected = '{"name": "Alice", "age": 30}';
        $actual   = '{ "age": 30, "name": "Alice" }';

        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }

    public function testJsonStringsAreNotEqual(): void
    {
        $expected = '{"name": "Alice", "age": 30}';
        $actual   = '{"name": "Bob", "age": 30}';

        // 失敗
        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }
}
