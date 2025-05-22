<?php

use PHPUnit\Framework\TestCase;

class MatchesRegularExpressionTest extends TestCase
{
    public function testMatchesPattern(): void
    {
        $pattern = '/^user_\d+$/';
        $value = 'user_123';

        $this->assertMatchesRegularExpression($pattern, $value);
    }

    public function testDoesNotMatch(): void
    {
        $pattern = '/^[A-Z]{3}-\d{4}$/'; // 例如 ABC-2024 格式
        $value = 'abc-2024';

        // 失敗
        $this->assertMatchesRegularExpression($pattern, $value); 
    }
}
