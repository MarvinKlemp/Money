<?php

namespace MarvinKlemp\Money;

class Money
{
    protected $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function remove($amount)
    {
        return new Money($this->amount - $amount);
    }

    public function amount()
    {
        return $this->amount;
    }

    public function add($amount)
    {
        return new Money($this->amount + $amount);
    }
}
