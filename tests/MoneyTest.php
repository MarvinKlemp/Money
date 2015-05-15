<?php

namespace MarvinKlemp\Money\Tests;

use MarvinKlemp\Money\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $money = Money::USD(10);
        $this->assertInstanceOf(Money::class, $money);
    }

    public function test_it_should_throw_an_invalid_argument_exception_on_construct()
    {
        $this->setExpectedException(\InvalidArgumentException::class, "You have to provide an amount of money");
        $money = Money::USD();
        $this->assertInstanceOf(Money::class, $money);
    }

    public function test_it_should_be_immutable()
    {
        $money = Money::USD(10);
        $moneyClone = clone($money);

        $this->assertEquals($money, $moneyClone);

        $money->remove(5);
        $this->assertEquals($money, $moneyClone);

        $money->add(5);
        $this->assertEquals($money, $moneyClone);
    }

    public function test_it_should_be_able_remove_a_given_amount()
    {
        $money = Money::USD(10);

        $money = $money->remove(5);
        $this->assertEquals(5, $money->amount());
    }

    public function test_it_should_be_able_add_a_given_amount()
    {
        $money = Money::USD(10);

        $money = $money->add(5);
        $this->assertEquals(15, $money->amount());
    }
}
