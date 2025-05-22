<?php

use PHPUnit\Framework\TestCase;

class StringStartsWithTest extends TestCase
{
    public function testStartsWithPrefix(): void
    {
        $string = 'Laravel is great';
        $prefix = 'Laravel';

        $this->assertStringStartsWith($prefix, $string);
    }

    public function testNotStartsWithPrefix(): void
    {
        $string = 'PHPUnit is useful';
        $prefix = 'Laravel';

        // 失敗
        $this->assertStringStartsWith($prefix, $string);
    }
}
