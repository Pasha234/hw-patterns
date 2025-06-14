<?php

namespace Pasha234\HwPatterns\Cooking;

use SplObjectStorage;
use Pasha234\HwPatterns\Observers\Observer;
use Pasha234\HwPatterns\Observable\Observable;
use Pasha234\HwPatterns\Cooking\Enum\CookingStatus;

class CookingProcess implements Observable, CookingInterface
{
    protected SplObjectStorage $observers;
    protected CookingStatus $status;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(Observer $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(Observer $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notifyObservers(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update([]);
        }
    }

    public function getStatus(): CookingStatus
    {
        return $this->status;
    }

    public function setStatus(CookingStatus $status): void
    {
        $this->status = $status;
        echo "...\n";
        $this->notifyObservers();
    }

    public function cook(): void
    {
        $this->setStatus(CookingStatus::COOKING);
        sleep(1); // Имитация готовки
    }
}