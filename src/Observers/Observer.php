<?php

namespace Pasha234\HwPatterns\Observers;

interface Observer
{
    public function update(array $data): void;
}