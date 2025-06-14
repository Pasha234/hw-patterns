<?php

use DI\Container;
use Pasha234\HwPatterns\AbstractFactory\FoodFactory;
use Pasha234\HwPatterns\AbstractFactory\FoodFactoryInterface;

return [
    FoodFactoryInterface::class => DI\create(FoodFactory::class),
];