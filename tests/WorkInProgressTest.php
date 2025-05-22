<?php

use PHPUnit\Framework\TestCase;

/**
 * 將測試標記為未完成、跳過測試
 */
final class WorkInProgressTest extends TestCase
{
    public function testSomething(): void
    {
        // Optional: Test anything here, if you want.
        $this->assertTrue(true, 'This should already work.');

        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
            'This test has not been implemented yet.',
        );
    }

    public function testConnection(): void
    {
        $this->markTestSkipped('尚未實作，暫時跳過');
    }
}
