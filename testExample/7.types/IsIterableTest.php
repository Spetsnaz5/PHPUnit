<?php

use PHPUnit\Framework\TestCase;

class IsIterableTest extends TestCase
{
    public function testArrayIsIterable(): void
    {
        $items = ['a', 'b', 'c'];
        $this->assertIsIterable($items);
    }

    public function testGeneratorIsIterable(): void
    {
        $generator = $this->getGenerator();
        $this->assertIsIterable($generator);
    }

    public function testStringIsNotIterable(): void
    {
        $value = 'not iterable';
        // 失敗
        $this->assertIsIterable($value); 
    }

    private function getGenerator(): Generator
    {
        yield 1;
        yield 2;
        yield 3;
    }
}
