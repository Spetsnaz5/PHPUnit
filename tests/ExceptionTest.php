<?php 

use PHPUnit\Framework\TestCase;

final class ExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        throw new InvalidArgumentException('Invalid amount');
    }

    public function testExceptionCode()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(404);

        throw new \Exception('Order not found', 404);
    }

    public function testExceptionMessage(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->expectExceptionMessage('Invalid amount');

        throw new InvalidArgumentException('Invalid amount');
    }
}