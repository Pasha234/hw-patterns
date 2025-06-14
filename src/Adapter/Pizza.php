<?php

namespace Pasha234\HwPatterns\Adapter;

class Pizza
{
    public function __construct(
        public string $description,
        public float $price,
    ) {}
}