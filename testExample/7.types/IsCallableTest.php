<?php

use PHPUnit\Framework\TestCase;

class IsCallableTest extends TestCase
{
    public function testAnonymousFunctionIsCallable(): void
    {
        $fn = function () {
            return 'Hello';
        };

        $this->assertIsCallable($fn);
    }

    public function testNamedFunctionIsCallable(): void
    {
        $this->assertIsCallable('strlen');
    }

    public function testStringIsNotCallable(): void
    {
        $value = 'not_callable';

        // 失敗
        $this->assertIsCallable($value);
    }
}
