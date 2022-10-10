<?php

namespace web\Model;

use web\Interface\PizzaInterface;

class Munich implements PizzaInterface
{
    public function getCost(): float
    {
        return 285;
    }

    public function getIngredients(): array
    {
        return [
            'sausages' => 'мюнхенські і баварські ковбаски',
            'pepperoni' => 'пепероні',
            'cheri' => 'томатами черрі',
            'pickled_cucumbers' => 'солоними огірками',
            'onion' => 'цибулею',
            'hot_chili' => 'гострим перцем чилі',
            'mozzarella_cheese' => 'сиром моцарелла',
            'emmental' => 'емменталь',
            'pilatti-sauce' => 'соус пілатті'
        ];
    }

    public function getTitle(): string
    {
        return 'Munich';
    }

}

