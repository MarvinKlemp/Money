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

    public function remove(Money $money)
    {
        if (!$this->currency->equals($money->currency)) {
            throw new \RuntimeException("You can't remove different currencies");
        }

        return new Money($this->amount - $money->amount(), $this->currency);
    }

    public function add(Money $money)
    {
        if (!$this->currency->equals($money->currency)) {
            throw new \RuntimeException("You can't add different currencies");
        }

        return new Money($this->amount + $money->amount(), $this->currency);
    }

    public function amount()
    {
        return $this->amount;
    }

    public function currency()
    {
        return $this->currency;
    }
}
