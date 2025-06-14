<?php

namespace Pasha234\HwPatterns\Observers;

class NotificationObserver implements Observer
{
    public function update(array $data): void
    {
        echo $data['message'] ?? '';
    }
}