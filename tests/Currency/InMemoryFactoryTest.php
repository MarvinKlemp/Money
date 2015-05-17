<?php

namespace MarvinKlemp\Money\Tests\Currency;

use MarvinKlemp\Money\Currency\Currency;
use MarvinKlemp\Money\Currency\CurrencyFactoryInterface;
use MarvinKlemp\Money\Currency\InMemoryFactory;
use MarvinKlemp\Money\Currency\UnsupportedCurrencyException;

class InMemoryFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $factory = new InMemoryFactory([]);
        $this->assertInstanceOf(CurrencyFactoryInterface::class, $factory);
    }

    public function test_it_should_build_currency_with_name()
    {
        $factory = new InMemoryFactory(['USD' => '$']);

        $currency = $factory->withName('USD');
        $this->assertInstanceOf(Currency::class, $currency);
        $this->assertEquals('USD', $currency->name());
        $this->assertEquals('$', $currency->representation());
    }

    public function test_with_name_should_throw_unsupported_currency_exception()
    {
        $factory = new InMemoryFactory([]);

        $this->setExpectedException(UnsupportedCurrencyException::class);
        $factory->withName('USD');
    }

    public function test_it_should_build_currency_with_representation()
    {
        $factory = new InMemoryFactory(['USD' => '$']);

        $currency = $factory->withRepresentation('$');
        $this->assertInstanceOf(Currency::class, $currency);
        $this->assertEquals('USD', $currency->name());
        $this->assertEquals('$', $currency->representation());
    }

    public function test_with_representation_should_throw_unsupported_currency_exception()
    {
        $factory = new InMemoryFactory([]);

        $this->setExpectedException(UnsupportedCurrencyException::class);
        $factory->withRepresentation('$');
    }
}
