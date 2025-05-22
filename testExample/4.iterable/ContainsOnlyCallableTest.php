<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyCallableTest extends TestCase
{
    public function testAllItemsAreCallables(): void
    {
        $items = [
            fn() => true,
            'strlen',
        ];

        $this->assertContainsOnlyCallable($items);
    }

    public function testMixedItemsFail(): void
    {
        $items = [
            fn() => true,
            'not_a_function',
        ];

        //失敗
        $this->assertContainsOnlyCallable($items);
    }
}
