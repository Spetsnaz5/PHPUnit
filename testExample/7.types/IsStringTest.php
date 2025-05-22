<?php

use PHPUnit\Framework\TestCase;

class IsStringTest extends TestCase
{
    public function testValueIsString(): void
    {
        $value = "hello world";
        $this->assertIsString($value);
    }

    public function testEmptyStringIsString(): void
    {
        $value = "";
        $this->assertIsString($value);
    }

    public function testIntIsNotString(): void
    {
        $value = 123;
        // 失敗
        $this->assertIsString($value);
    }

    public function testNullIsNotString(): void
    {
        $value = null;
        // 失敗
        $this->assertIsString($value);
    }
}
