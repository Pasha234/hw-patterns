<?php

namespace Pasha234\HwPatterns\Observable;

use Pasha234\HwPatterns\Observers\Observer;

interface Observable
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notifyObservers(): void;
}