<?php

use PHPUnit\Framework\TestCase;

class StringContainsStringTest extends TestCase
{
    public function testContainsSubstring(): void
    {
        $text = 'The quick brown fox jumps over the lazy dog';
        $this->assertStringContainsString('brown fox', $text);
    }

    public function testDoesNotContainSubstring(): void
    {
        $text = 'The quick brown fox';

        // 失敗
        $this->assertStringContainsString('tiger', $text);
    }
}
