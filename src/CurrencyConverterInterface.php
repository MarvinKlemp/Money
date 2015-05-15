<?php

namespace MarvinKlemp\Money;

interface CurrencyConverterInterface
{
    /**
     * @param Money $money
     * @param Currency $to
     * @return Money
     */
    public function exchangeToCurrency(Money $money, Currency $to);
} 