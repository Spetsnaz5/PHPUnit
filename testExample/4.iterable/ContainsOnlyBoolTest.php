<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyBoolTest extends TestCase
{
    public function testAllItemsAreBools(): void
    {
        $items = [true, false, true];

        $this->assertContainsOnlyBool($items);
    }

    public function testMixedItemsFail(): void
    {
        $items = [true, 1, false];

        $this->assertContainsOnlyBool($items); // 測試將失敗
    }
}
