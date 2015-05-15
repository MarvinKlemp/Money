<?php

namespace MarvinKlemp\Money;

class Currency
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
