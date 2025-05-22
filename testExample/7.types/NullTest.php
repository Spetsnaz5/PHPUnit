<?php

use PHPUnit\Framework\TestCase;

class NullTest extends TestCase
{
    public function testValueIsNull(): void
    {
        $value = null;
        $this->assertNull($value);
    }

    public function testValueIsNotNull(): void
    {
        $value = 0;
        // 失敗
        $this->assertNull($value);
    }

    public function testUnsetVariableIsNull(): void
    {
        $value = null;
        unset($value);
        $this->assertNull($value ?? null);
    }
}
