<?php

namespace Pasha234\HwPatterns\Decorators;

class PepperDecorator extends FoodItemDecorator
{
    public function getPrice(): float
    {
        return $this->foodItem->getPrice() + 0.4;        
    }

    public function getDescription(): string
    {
        return $this->foodItem->getDescription() . " with pepper";
    }
}