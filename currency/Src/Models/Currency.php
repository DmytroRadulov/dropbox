<?php

namespace Src\Models;

use InvalidArgumentException;

class Currency
{
   private $isoCode;

    public function __construct($isoCode)
    {
        $this->setIsoCode($isoCode);
    }


    public function getIsoCode()
    {
        return $this->isoCode;
    }

    private function setIsoCode($isoCode)
    {
        if($this->validate($isoCode)) {
            $this->isoCode = $isoCode;
        }
    }

    private function validate($isoCode)
    {
        if (!preg_match('/^[A-Z]{3}$/', $isoCode)) {
            throw new InvalidArgumentException('Wrong currency name format');
        }
        return true;
    }

    public function equals(Currency $obj)
    {
        return $this->getIsoCode() === $obj->getIsoCode();
    }
}
