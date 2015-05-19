<?php

namespace MarvinKlemp\Money\Tests\Money;

use MarvinKlemp\Money\Currency\Currency;
use MarvinKlemp\Money\Currency\CurrencyFactoryInterface;
use MarvinKlemp\Money\Money\Money;
use MarvinKlemp\Money\Money\MoneyFactory;

class MoneyFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $factory = new MoneyFactory($this->getCurrencyFactoryDummy());

        $this->assertInstanceOf(MoneyFactory::class, $factory);
    }

    public function test_it_should_factor_money()
    {
        $currency = $this->getCurrencyDummy();

        $stub = $this->getCurrencyFactoryDummy();
        $stub->expects($this->once())
            ->method('withName')
            ->with('USD')
            ->willReturn($currency);

        $factory = new MoneyFactory($stub);
        $dollar = $factory->money(15, "USD");
        $this->assertInstanceOf(Money::class, $dollar);
    }

    protected function getCurrencyFactoryDummy()
    {
        return $this->getMockForAbstractClass(CurrencyFactoryInterface::class);
    }

    private function getCurrencyDummy()
    {
        return $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
    }
}
