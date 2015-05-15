<?php

namespace MarvinKlemp\Money;

class Money
{
    protected $amount;

    protected $currency;

    public function __construct($amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function remove($amount)
    {
        return new Money($this->amount - $amount, $this->currency);
    }

    public function amount()
    {
        return $this->amount;
    }

    public function add($amount)
    {
        return new Money($this->amount + $amount, $this->currency);
    }
}
