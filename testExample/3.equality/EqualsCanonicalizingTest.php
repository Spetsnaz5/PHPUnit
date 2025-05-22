<?php

use PHPUnit\Framework\TestCase;

final class EqualsCanonicalizingTest extends TestCase
{
    public function testCanonicalizingEqualsWithSameElementsDifferentOrder()
    {
        // assertEquals 有序
        // assertEqualsCanonicalizing 無序
        $this->assertEqualsCanonicalizing([1, 2, 3], [3, 2, 1]);
    }
}
