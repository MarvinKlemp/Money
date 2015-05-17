<?php

namespace MarvinKlemp\Money\Currency;

class Currency
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $representation;

    /**
     * @param string $name
     * @param string $representation
     */
    public function __construct($name, $representation)
    {
        $this->name = $name;
        $this->representation = $representation;
    }

    /**
     * @param  Currency $currency
     * @return bool
     */
    public function equals(Currency $currency)
    {
        return $this->name === $currency->name;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function representation()
    {
        return $this->representation;
    }
}
