<?php

namespace MarvinKlemp\Money\Currency;

class Currency
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Currency $currency
     * @return bool
     */
    public function equals(Currency $currency)
    {
        return $this->name === $currency->name;
    }
}
