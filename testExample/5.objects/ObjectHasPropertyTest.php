<?php

use PHPUnit\Framework\TestCase;

final class ObjectHasPropertyTest extends TestCase
{
    public function testObjectHasProperty(): void
    {
        $obj = new class {
            public $foo;
            private $bar;
        };

        $this->assertObjectHasProperty('foo', $obj);
        $this->assertObjectHasProperty('bar', $obj);
    }

    public function testObjectMissingPropertyFails(): void
    {
        $obj = new stdClass();

        // 失敗
        $this->assertObjectHasProperty('missing', $obj);
    }
}
