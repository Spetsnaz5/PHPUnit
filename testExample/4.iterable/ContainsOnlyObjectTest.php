<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyObjectTest extends TestCase
{
    public function testAllItemsAreObjects(): void
    {
        $items = [
            new stdClass(),
            new DateTime(),
            (object)['key' => 'value'],
        ];

        $this->assertContainsOnlyObject($items);
    }

    public function testMixedItemsFail(): void
    {
        $items = [
            new stdClass(),
            'string',
            new DateTime(),
        ];

        // 失敗
        $this->assertContainsOnlyObject($items);
    }
}
