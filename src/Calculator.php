<?php

namespace src;

class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function divide($a, $b)
    {
        if ($b == 0)
            throw new \InvalidArgumentException("Division by zero");

        return $a / $b;
    }
}
