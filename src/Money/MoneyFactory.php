<?php

namespace MarvinKlemp\Money\Money;

use MarvinKlemp\Money\Currency\CurrencyFactoryInterface;
use MarvinKlemp\Money\Currency\UnsupportedCurrencyException;

class MoneyFactory
{
    /**
     * @var CurrencyFactoryInterface
     */
    protected $factory;

    /**
     * @param CurrencyFactoryInterface $factory
     */
    public function __construct(CurrencyFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param float $amount
     * @param string $currency
     * @throws UnsupportedCurrencyException
     * @return Money
     */
    public function money($amount, $currency)
    {
        $currency = $this->factory->withName($currency);
        return new Money($amount, $currency);
    }
}
