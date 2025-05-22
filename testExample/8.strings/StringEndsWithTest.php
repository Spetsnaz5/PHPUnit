<?php

use PHPUnit\Framework\TestCase;

class StringEndsWithTest extends TestCase
{
    public function testEndsWithSuffix(): void
    {
        $string = 'welcome.blade.php';
        $suffix = '.php';

        $this->assertStringEndsWith($suffix, $string);
    }

    public function testDoesNotEndWithSuffix(): void
    {
        $string = 'main.css';
        $suffix = '.js';

        // 失敗
        $this->assertStringEndsWith($suffix, $string);
    }
}
