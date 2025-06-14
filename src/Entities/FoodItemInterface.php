<?php

namespace Pasha234\HwPatterns\Entities;

interface FoodItemInterface
{
    public function getDescription(): string;
    public function getPrice(): float;
}
