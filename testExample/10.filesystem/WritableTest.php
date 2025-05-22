<?php

use PHPUnit\Framework\TestCase;

class WritableTest extends TestCase
{
    public function testFileIsWritable(): void
    {
        $file = __DIR__ . '/writable-test.txt';
        file_put_contents($file, 'test');
        // 讀寫 rw-rw-rw-
        chmod($file, 0666);

        $this->assertIsWritable($file);

        unlink($file); // 清理
    }

    public function testDirectoryIsWritable(): void
    {
        $this->assertIsWritable(__DIR__);
    }

    public function testUnreadableFileFails(): void
    {
        $file = __DIR__ . '/unwritable-test.txt';
        file_put_contents($file, 'test');
        // 讀 r--r--r--
        chmod($file, 0444); 

        // 失敗
        $this->assertIsWritable($file); 

        unlink($file); // 清理
    }
}
