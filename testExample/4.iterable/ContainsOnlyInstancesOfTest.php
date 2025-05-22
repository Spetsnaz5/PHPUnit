<?php

use PHPUnit\Framework\TestCase;

final class ContainsOnlyInstancesOfTest extends TestCase
{
    public function testAllItemsAreDateTimeInstances()
    {
        $items = [new DateTime(), new DateTimeImmutable()];
        $this->assertContainsOnlyInstancesOf(DateTimeInterface::class, $items);
    }

    public function testAllItemsAreStdClassInstances()
    {
        $items = [new stdClass(), new stdClass()];
        $this->assertContainsOnlyInstancesOf(stdClass::class, $items);
    }

    public function testFailsWhenItemIsNotCorrectInstance()
    {
        $items = [new stdClass(), new DateTime()];
        //失敗
        $this->assertContainsOnlyInstancesOf(stdClass::class, $items);
    }

    public function testEmptyArrayPasses()
    {
        $items = [];
        $this->assertContainsOnlyInstancesOf(stdClass::class, $items);
    }
}
