<?php

namespace Pasha234\HwPatterns\AbstractFactory;

use Pasha234\HwPatterns\Adapter\Pizza;
use Pasha234\HwPatterns\Adapter\PizzaAdapter;
use Pasha234\HwPatterns\Entities\Burger;
use Pasha234\HwPatterns\Entities\HotDog;
use Pasha234\HwPatterns\Entities\Sandwich;

class FoodFactory implements FoodFactoryInterface
{
    public function createBurger(): Burger
    {
        return new Burger(20);
    }

    public function createHotDog(): HotDog
    {
        return new HotDog(10);
    }

    public function createSandwich(): Sandwich
    {
        return new Sandwich(15);
    }

    public function createPizza(): PizzaAdapter
    {
        $pizza = new Pizza('Pizza', 30);
        return new PizzaAdapter($pizza);
    }
}