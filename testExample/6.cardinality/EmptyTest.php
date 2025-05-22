<?php

use PHPUnit\Framework\TestCase;

final class EmptyTest extends TestCase
{
    public function testEmptyArray(): void
    {
        $arr = [];
        $this->assertEmpty($arr);
    }

    public function testEmptyString(): void
    {
        $str = "";
        $this->assertEmpty($str);
    }

    public function testZeroIsEmpty(): void
    {
        $num = 0;
        $this->assertEmpty($num);
    }

    public function testFalseIsEmpty(): void
    {
        $bool = false;
        $this->assertEmpty($bool);
    }

    public function testNullIsEmpty(): void
    {
        $var = null;
        $this->assertEmpty($var);
    }

    public function testNonEmptyFails(): void
    {
        $arr = [1, 2, 3];
        // 失敗
        $this->assertEmpty($arr);
    }
}
