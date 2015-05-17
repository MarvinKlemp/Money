<?php

namespace MarvinKlemp\Money;

use MarvinKlemp\Money\Currency\Currency;

interface CurrencyConverterInterface
{
    /**
     * @param  Money    $money
     * @param  Currency $to
     * @return Money
     */
    public function exchangeToCurrency(Money $money, Currency $to);
}
