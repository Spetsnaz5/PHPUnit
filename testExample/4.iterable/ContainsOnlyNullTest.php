<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyNullTest extends TestCase
{
    public function testAllItemsAreNull(): void
    {
        $items = [null, null, null];

        foreach ($items as $item) {
            $this->assertNull($item);
        }
    }

    public function testMixedItemsFail(): void
    {
        $items = [null, 'string', null];

        foreach ($items as $item) {
            $this->assertNull($item);
        }
    }
}
