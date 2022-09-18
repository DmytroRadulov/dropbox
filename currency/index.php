<?php

use src\Models\Currency;
use src\Models\Money;

require_once 'autoloader.php';


$c = new Currency('USD');
$m = new Money(12.3334, $c);

var_dump($m);
