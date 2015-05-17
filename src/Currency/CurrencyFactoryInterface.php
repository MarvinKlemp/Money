<?php

namespace MarvinKlemp\Money\Currency;

interface CurrencyFactoryInterface
{
    /**
     * @param  string $name
     * @return Currency
     * @throws UnsupportedCurrencyException
     */
    public function withName($name);

    /**
     * @param  string $representation
     * @return Currency
     * @throws UnsupportedCurrencyException
     */
    public function withRepresentation($representation);
}
