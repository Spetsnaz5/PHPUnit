<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * 使用帶有命名資料集的資料提供者
 */
final class NamedDataSetsTest extends TestCase
{
    /**
     * 資料提供器 #[DataProvider(::ProviderFunName)]
     */
    public static function additionProvider(): array
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 3],
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