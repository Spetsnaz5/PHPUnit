<?php

use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function testValidJson(): void
    {
        $json = '{"name": "Alice", "age": 30}';
        $this->assertJson($json);
    }

    public function testInvalidJsonFails(): void
    {
        $invalidJson = '{"name": "Alice", "age": }';

        // 失敗
        $this->assertJson($invalidJson);
    }

    public function testEmptyStringFails(): void
    {
        // 失敗
        $this->assertJson('');
    }
}
