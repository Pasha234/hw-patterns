<?php

namespace Pasha234\HwPatterns\Decorators;

use Pasha234\HwPatterns\Entities\FoodItemInterface;

abstract class FoodItemDecorator implements FoodItemInterface
{
    public function __construct(
        protected FoodItemInterface $foodItem
    ) {}

    public function getDescription(): string
    {
        return $this->foodItem->getDescription();
    }

    public function getPrice(): float
    {
        return $this->foodItem->getPrice();
    }
}