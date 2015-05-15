<?php

namespace MarvinKlemp\Money\Tests;

use MarvinKlemp\Money\Currency;
use MarvinKlemp\Money\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $money = new Money(10, $this->getCurrencyDummy());
        $this->assertInstanceOf(Money::class, $money);
    }

    public function test_it_should_be_immutable()
    {
        $money = new Money(10, $this->getCurrencyDummy());
        $moneyClone = clone($money);

        $this->assertEquals($money, $moneyClone);

        $money->remove(5);
        $this->assertEquals($money, $moneyClone);

        $money->add(5);
        $this->assertEquals($money, $moneyClone);
    }

    public function test_it_should_be_able_remove_a_given_amount()
    {
        $money = new Money(10, $this->getCurrencyDummy());

        $money = $money->remove(5);
        $this->assertEquals(5, $money->amount());
    }

    public function test_it_should_be_able_add_a_given_amount()
    {
        $money = new Money(10, $this->getCurrencyDummy());

        $money = $money->add(5);
        $this->assertEquals(15, $money->amount());
    }

    private function getCurrencyDummy()
    {
        return $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
    }
}
