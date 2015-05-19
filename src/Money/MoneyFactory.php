<?php

namespace MarvinKlemp\Money\Money;

use MarvinKlemp\Money\Currency\CurrencyFactoryInterface;

class MoneyFactory
{
    protected $factory;

    public function __construct(CurrencyFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function money($amount, $currency)
    {
        $currency = $this->factory->withName($currency);

        return new Money($amount, $currency);
    }
}
