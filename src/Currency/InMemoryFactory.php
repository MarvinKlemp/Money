<?php

namespace MarvinKlemp\Money\Currency;

class InMemoryFactory implements CurrencyFactoryInterface
{
    protected $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    /**
     * @param  string $name
     * @return Currency
     * @throws UnsupportedCurrencyException
     */
    public function withName($name)
    {
        if (!isset($this->currencies[$name])) {
            throw new UnsupportedCurrencyException();
        }

        return new Currency($name, $this->currencies[$name]);
    }

    /**
     * @param  string $representation
     * @return Currency
     * @throws UnsupportedCurrencyException
     */
    public function withRepresentation($representation)
    {
        $key = array_search($representation, $this->currencies);

        if ($key === false || $key === null) {
            throw new UnsupportedCurrencyException();
        }

        return new Currency($key, $representation);
    }
}
