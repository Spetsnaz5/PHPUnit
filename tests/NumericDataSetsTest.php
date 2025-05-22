<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * 使用回傳陣列的資料提供者
 */
final class NumericDataSetsTest extends TestCase
{
    /**
     * 資料提供器 #[DataProvider(::ProviderFunName)]
     */
    public static function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3],
        ];
    }

    /**
     * @uses PHPUnit\Framework\Attributes\DataProvider
     */
    #[DataProvider('additionProvider')]
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }
}