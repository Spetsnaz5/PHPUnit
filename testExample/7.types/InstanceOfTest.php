<?php

use PHPUnit\Framework\TestCase;
use src\User;

class AssertInstanceOfTest extends TestCase
{
    public function testIsDateTimeInstance(): void
    {
        $date = new DateTime();
        $this->assertInstanceOf(DateTime::class, $date);
    }

    public function testIsNotExpectedInstance(): void
    {
        $exception = new Exception();

        // 失敗
        $this->assertInstanceOf(RuntimeException::class, $exception); 
    }

    public function testCustomClassInstance(): void
    {
        $user = new User('leo', 25);
        $this->assertInstanceOf(User::class, $user);
    }
}
