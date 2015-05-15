<?php

namespace MarvinKlemp\Money;

class Money
{
    protected $amount;

    protected $currency;

    private function __construct($amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public static function __callStatic($name, array $arguments)
    {
        if (!isset($arguments[0])) {
            throw new \InvalidArgumentException("You have to provide an amount of money");
        }

        return new Money($arguments[0], new Currency($name));
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
