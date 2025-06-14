<?php

namespace Pasha234\HwPatterns\Adapter;

use Pasha234\HwPatterns\Entities\FoodItemInterface;

class PizzaAdapter implements FoodItemInterface
{
    private $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getDescription(): string
    {
        return $this->pizza->description;
    }

    public function getPrice(): float
    {
        return $this->pizza->price;
    }
}