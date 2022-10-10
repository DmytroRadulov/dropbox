<?php

namespace web\Model;

use web\Interface\PizzaInterface;

class Mexican implements PizzaInterface
{
    public function getCost(): float
    {
        return 175;
    }

    public function getIngredients(): array
    {
        return [
            'cream_cheese_sauce' => 'вершково-сирний соус',
            'chicken_thigh' => 'куряче стегно',
            'mozzarella_cheese' => 'сир Моцарелла',
            'pineapple_and_corn_salsa' => 'сальса з ананасу та кукурудзи',
            'guacamole' => 'Гуакамолє',
            'nachos_chips' => 'чіпси Начос',
            'green_chili' => 'зелений перець чілі',
            'cilantro' => 'кінза',
        ];
    }

    public function getTitle(): string
    {
        return 'Mexican';
    }
}

