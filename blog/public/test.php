<?php

require_once __DIR__ . '/../vendor/autoload.php';

use web\Model\ChickenGrill;
use web\Model\Munich;
use web\Model\Mexican;
use web\Model\PizzaCalculator;

$pizza = new ChickenGrill();
$pizza1 = new Mexican();
$pizza2 = new Munich();

$calculate = new PizzaCalculator();
$calculate->add($pizza);
$calculate->add($pizza1);
$calculate->add($pizza2);
print_r($calculate->ingredients());
print_r($calculate->price());





