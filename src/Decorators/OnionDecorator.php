<?php

namespace Pasha234\HwPatterns\Decorators;

class OnionDecorator extends FoodItemDecorator
{
    public function getPrice(): float
    {
        return $this->foodItem->getPrice() + 0.3;        
    }

    public function getDescription(): string
    {
        return $this->foodItem->getDescription() . " with onion";
    }
}