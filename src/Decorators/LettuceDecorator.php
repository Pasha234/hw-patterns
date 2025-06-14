<?php

namespace Pasha234\HwPatterns\Decorators;

class LettuceDecorator extends FoodItemDecorator
{
    public function getPrice(): float
    {
        return $this->foodItem->getPrice() + 0.5;        
    }

    public function getDescription(): string
    {
        return $this->foodItem->getDescription() . " with lettuce";
    }
}