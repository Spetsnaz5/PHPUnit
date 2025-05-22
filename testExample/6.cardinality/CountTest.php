<?php

use PHPUnit\Framework\TestCase;

final class CountTest extends TestCase
{
    public function testArrayCount(): void
    {
        $items = [1, 2, 3];
        $this->assertCount(3, $items);
    }

    public function testEmptyArrayCount(): void
    {
        $items = [];
        $this->assertCount(0, $items);
    }

    public function testCountableObject(): void
    {
        $obj = new ArrayObject([1, 2]);
        $this->assertCount(2, $obj);
    }

    public function testCountFails(): void
    {
        $items = [1, 2, 3];

        //失敗
        $this->assertCount(2, $items);
    }
}
