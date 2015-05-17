<?php

namespace MarvinKlemp\Money;

use MarvinKlemp\Money\Currency\Currency;

class Money
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param float    $amount
     * @param Currency $currency
     */
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

        return new Money($arguments[0], new Currency($name, "$"));
    }

    /**
     * @param  Money $money
     * @return Money
     */
    public function remove(Money $money)
    {
        if (!$this->currency->equals($money->currency)) {
            throw new \RuntimeException("You can't remove different currencies");
        }

        return new Money($this->amount - $money->amount(), $this->currency);
    }

    /**
     * @param  Money $money
     * @return Money
     */
    public function add(Money $money)
    {
        if (!$this->currency->equals($money->currency)) {
            throw new \RuntimeException("You can't add different currencies");
        }

        return new Money($this->amount + $money->amount(), $this->currency);
    }

    /**
     * @return float
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function currency()
    {
        return $this->currency;
    }
}
