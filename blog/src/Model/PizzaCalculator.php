<?php

namespace web\Model;

use web\Interface\PizzaInterface;

class PizzaCalculator
{
    public $pizza = [];


    public function add(PizzaInterface $pizza)
    {
        $this->pizza[] = $pizza;

    }

    public function ingredients()
    {
        $ingredients = [];
        foreach ($this->pizza as $pizza) {
            $ingredients = array_merge($ingredients, $pizza->getIngredients());
        }
        return $ingredients;
    }

    public function price()
    {
        $price = 0;
        foreach ($this->pizza as $pizza) {
            $price += $pizza->getCost();
        }
        return $price;
    }
}