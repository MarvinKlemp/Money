<?php

namespace MarvinKlemp\Money\Tests\Money;

use MarvinKlemp\Money\Money\Money;

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

        $money->remove(Money::USD(5));
        $this->assertEquals($money, $moneyClone);

        $money->add(Money::USD(5));
        $this->assertEquals($money, $moneyClone);
    }

    public function test_it_should_be_able_remove_a_given_amount()
    {
        $money = Money::USD(10);

        $money = $money->remove(Money::USD(5));
        $this->assertEquals(5, $money->amount());
    }

    public function test_it_should_not_remove_different_currencies()
    {
        $money = Money::USD(10);

        $this->setExpectedException(\RuntimeException::class, "You can't remove different currencies");
        $money->remove(Money::Euro(5));
    }

    public function test_it_should_not_add_different_currencies()
    {
        $money = Money::USD(10);

        $this->setExpectedException(\RuntimeException::class, "You can't add different currencies");
        $money->add(Money::Euro(5));
    }

    public function test_it_should_be_able_add_a_given_amount()
    {
        $money = Money::USD(5);

        $money = $money->add(Money::USD(5));
        $this->assertEquals(10, $money->amount());
    }
}
