<?php

use PHPUnit\Framework\TestCase;

class FileExistsTest extends TestCase
{
    public function testFileExists(): void
    {
        $file = __FILE__;
        $this->assertFileExists($file);
    }

    public function testFileDoesNotExist(): void
    {
        $file = __DIR__ . '/not-found.txt';
        // 失敗
        $this->assertFileExists($file);
    }
}
