<?php

namespace web\Model;

use web\Interface\PizzaInterface;

class  ChickenGrill implements PizzaInterface
{
    public function getCost(): float
    {
        return 194;
    }
    public function getIngredients() : array
    {
        return [
            'cheese_sauce' => 'сирний соус',
            'chicken_thigh' => 'куряче стегно',
            'fried_mushrooms' => 'смажені печериці',
            'cheri' => 'чері',
            'onion_fries' => 'цибуля фрі',
            'mozzarella_cheese' => 'сир Моцарелла',
            'parmesan' => 'Пармезан'
        ];
    }
    public function getTitle() :string
    {
        return 'Chicken Grill';
    }
}

