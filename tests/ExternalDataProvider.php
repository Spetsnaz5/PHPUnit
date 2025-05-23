<?php

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * 使用回傳陣列的外部資料提供者
 */
final class ExternalDataProvider
{
    /**
     * 資料提供器 #[DataProviderExternal(::ProviderClassName, ::ProviderFunName)]
     */
    public static function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 4],
            [1, 1, 2],
        ];
    }
}

final class NumericDataSetsTest extends TestCase
{
    /**
     * @uses PHPUnit\Framework\Attributes\DataProviderExternal
     */
    #[DataProviderExternal(ExternalDataProvider::class, 'additionProvider')]
    public function testSum(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }
}