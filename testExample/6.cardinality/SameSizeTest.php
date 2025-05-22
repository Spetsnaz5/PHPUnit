<?php

use PHPUnit\Framework\TestCase;

final class SameSizeTest extends TestCase
{
    public function testSameSizePass(): void
    {
        $expected = [1, 2, 3];
        $actual = ['a', 'b', 'c'];

        $this->assertSameSize($expected, $actual);
    }

    public function testSameSizeFail(): void
    {
        $expected = [1, 2, 3];
        $actual = ['a', 'b'];

        //失敗
        $this->assertSameSize($expected, $actual);
    }
}
