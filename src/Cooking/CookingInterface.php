<?php

namespace Pasha234\HwPatterns\Cooking;

use Pasha234\HwPatterns\Cooking\Enum\CookingStatus;

interface CookingInterface
{
    public function cook(): void;
}