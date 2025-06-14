<?php

namespace Pasha234\HwPatterns\Entities;

class Sandwich implements FoodItemInterface
{
    public function __construct(
        protected float $price,
    ) {}

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return "Sandwich";
    }
}
