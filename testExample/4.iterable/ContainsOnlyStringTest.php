<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyStringTest extends TestCase
{
    public function testAllItemsAreStrings(): void
    {
        $items = ['apple', 'banana', 'cherry'];

        $this->assertContainsOnlyString($items);
    }

    public function testMixedItemsFail(): void
    {
        $items = ['apple', 123, 'cherry'];

        $this->assertContainsOnlyString($items); // 會失敗
    }
}
