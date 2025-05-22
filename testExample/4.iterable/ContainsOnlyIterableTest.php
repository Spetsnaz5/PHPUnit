<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyIterableTest extends TestCase
{
    public function testAllItemsAreIterables(): void
    {
        $items = [
            [1, 2],                        // array 是 iterable
            new ArrayIterator([3, 4]),     // 實作 Iterator 的物件
        ];

        $this->assertContainsOnlyIterable($items);
    }

    public function testMixedItemsFail(): void
    {
        $items = [
            [1, 2],
            'not_iterable',               // 字串不是 iterable（PHP 定義上）
        ];

        //失敗
        $this->assertContainsOnlyIterable($items);
    }
}
