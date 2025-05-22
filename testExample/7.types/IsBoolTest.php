<?php

use PHPUnit\Framework\TestCase;

class IsBoolTest extends TestCase
{
    public function testTrueIsBool(): void
    {
        $value = true;
        $this->assertIsBool($value);
    }

    public function testFalseIsBool(): void
    {
        $value = false;
        $this->assertIsBool($value);
    }

    public function testStringIsNotBool(): void
    {
        $value = 'true';
        // 失敗
        $this->assertIsBool($value);
    }

    public function testIntIsNotBool(): void
    {
        $value = 1;

        // 失敗
        $this->assertIsBool($value);
    }
}
