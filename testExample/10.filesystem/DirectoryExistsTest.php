<?php

use PHPUnit\Framework\TestCase;

class DirectoryExistsTest extends TestCase
{
    public function testDirectoryExists(): void
    {
        $dir = __DIR__;
        $this->assertDirectoryExists($dir);
    }

    public function testDirectoryDoesNotExist(): void
    {
        $dir = __DIR__ . '/nonexistent-folder';
        //失敗
        $this->assertDirectoryExists($dir);
    }
}
