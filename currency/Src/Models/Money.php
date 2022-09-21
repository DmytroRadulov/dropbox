<?php

namespace Src\Models;

use InvalidArgumentException;


class Money
{
    private $amount;
    private $currency;


    public function __construct($amount,Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }


    public function getAmount()
    {
        return $this->amount;
    }


    private function setAmount($amount)
    {
        if(!is_int($amount) && !is_float($amount)) {
            throw new InvalidArgumentException('This is an exception');
        }
        $this->amount = $amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    private function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function equals(Money $money) {
        return $this->getAmount() === $money->getAmount()
            && $this->getCurrency()->equals($money->getCurrency());
    }

    public function add(Money $money)
    {
        if(!$this->getCurrency()->equals($money->getCurrency())) {
            throw new InvalidArgumentException('The currency is different');
        }
        return new self($this->getAmount() + $money->getAmount(), $this->getCurrency());

    }

}

