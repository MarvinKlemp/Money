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
        $match = 0;
        foreach ($this->currencies as $key => $val) {
            if ($val === $representation) {
                $match = 1;
                break;
            }
        }

        if ($match === 0) {
            throw new UnsupportedCurrencyException();
        }

        return new Currency($key, $val);
    }
}
