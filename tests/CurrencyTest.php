<?php

namespace MarvinKlemp\Money\Tests;

use MarvinKlemp\Money\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $currency = new Currency("USD");

        $this->assertInstanceOf(Currency::class, $currency);
    }

    public function test_it_should_be_immutable()
    {
        $currency = new Currency("USD");
        $currencyClone = clone ($currency);

        $this->assertEquals($currency, $currencyClone);

        $currency->equals($currencyClone);
        $this->assertEquals($currency, $currencyClone);
    }
}
