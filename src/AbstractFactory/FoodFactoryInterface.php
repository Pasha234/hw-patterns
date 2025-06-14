<?php

namespace Pasha234\HwPatterns\AbstractFactory;

use Pasha234\HwPatterns\Adapter\PizzaAdapter;
use Pasha234\HwPatterns\Entities\Burger;
use Pasha234\HwPatterns\Entities\HotDog;
use Pasha234\HwPatterns\Entities\Sandwich;

interface FoodFactoryInterface
{
    public function createBurger(): Burger;
    public function createHotDog(): HotDog;
    public function createSandwich(): Sandwich;
    public function createPizza(): PizzaAdapter;
}