<?php

namespace MarvinKlemp\Money;

use MarvinKlemp\Money\Currency\Currency;
use MarvinKlemp\Money\Money\Money;

interface CurrencyExchangerInterface
{
    /**
     * @param  Money    $money
     * @param  Currency $to
     * @return Money
     */
    public function exchangeToCurrency(Money $money, Currency $to);

    /**
     * @param Currency $from
     * @param Currency $to
     * @return float
     */
    public function getExchangeRate(Currency $from, Currency $to);
}
