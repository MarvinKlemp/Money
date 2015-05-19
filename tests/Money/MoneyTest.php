<?php

namespace MarvinKlemp\Money\Tests\Money;

use MarvinKlemp\Money\Currency\Currency;
use MarvinKlemp\Money\Money\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $money = new Money(10, $this->getCurrencyDummy());
        $this->assertInstanceOf(Money::class, $money);
    }

    public function test_it_should_be_immutable()
    {
        $stub = $this->getCurrencyDummy();
        $stub->expects($this->any())
            ->method('equals')
            ->willReturn(true);

        $money = new Money(10, $stub);
        $moneyClone = clone($money);

        $this->assertEquals($money, $moneyClone);

        $money->remove(new Money(10, $this->getCurrencyDummy()));
        $this->assertEquals($money, $moneyClone);

        $money->add(new Money(10, $this->getCurrencyDummy()));
        $this->assertEquals($money, $moneyClone);
    }

    // hier
    public function test_it_should_be_able_remove_a_given_amount()
    {
        $stub = $this->getCurrencyDummy();
        $stub->expects($this->once())
            ->method('equals')
            ->willReturn(true);
        $money = new Money(10, $stub);

        $money = $money->remove(new Money(5, $this->getCurrencyDummy()));
        $this->assertEquals(5, $money->amount());
    }

    public function test_it_should_not_remove_different_currencies()
    {
        $stub = $this->getCurrencyDummy();
        $stub->expects($this->once())
            ->method('equals')
            ->willReturn(false);
        $money = new Money(10, $stub);

        $this->setExpectedException(\RuntimeException::class, "You can't remove different currencies");
        $money->remove(new Money(5, $this->getCurrencyDummy()));
    }

    public function test_it_should_not_add_different_currencies()
    {
        $stub = $this->getCurrencyDummy();
        $stub->expects($this->once())
            ->method('equals')
            ->willReturn(false);
        $money = new Money(10, $stub);

        $this->setExpectedException(\RuntimeException::class, "You can't add different currencies");
        $money->add(new Money(5, $this->getCurrencyDummy()));
    }

    public function test_it_should_be_able_add_a_given_amount()
    {
        $stub = $this->getCurrencyDummy();
        $stub->expects($this->once())
            ->method('equals')
            ->willReturn(true);
        $money = new Money(10, $stub);

        $money = $money->add(new Money(5, $this->getCurrencyDummy()));
        $this->assertEquals(15, $money->amount());
    }

    private function getCurrencyDummy()
    {
        return $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
    }
}
