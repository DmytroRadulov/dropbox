<?php

namespace web\Interface;

interface PizzaInterface
{

    public function getCost(): float;


    public function getIngredients() : array;


    public function getTitle() :string;
}
