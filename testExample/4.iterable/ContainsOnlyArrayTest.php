<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyArrayTest extends TestCase
{
    public function testAllItemsAreArrays(): void
    {
        $items = [
            ['id' => 1],
            ['id' => 2],
            ['id' => 3],
        ];

        $this->assertContainsOnlyArray($items);
    }

    public function testMixedItemsFail(): void
    {
        $items = [
            ['id' => 1],
            'not-array',
            ['id' => 3],
        ];

        //失敗
        $this->assertContainsOnlyArray($items);
    }
}
