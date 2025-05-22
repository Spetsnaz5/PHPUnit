<?php

use PHPUnit\Framework\TestCase;

class ReadableTest extends TestCase
{
    public function testFileIsReadable(): void
    {
        $file = __FILE__;
        $this->assertIsReadable($file);
    }

    public function testNonexistentFileFails(): void
    {
        $file = __DIR__ . '/missing.txt';
        // 失敗
        $this->assertIsReadable($file); 
    }

    public function testUnreadableFileFails(): void
    {
        $file = __DIR__ . '/temp-unreadable.txt';

        file_put_contents($file, 'test');
        chmod($file, 0222); // 寫入但不可讀

        // 失敗
        $this->assertIsReadable($file); 

        unlink($file); // 清除測試檔
    }
}
