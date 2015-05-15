<?php

namespace MarvinKlemp\Money;

class Currency
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function equals(Currency $currency)
    {
        return $this->name === $currency->name;
    }
}
