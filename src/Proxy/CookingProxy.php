<?php

namespace Pasha234\HwPatterns\Proxy;

use Pasha234\HwPatterns\Cooking\CookingInterface;
use Pasha234\HwPatterns\Cooking\CookingProcess;
use Pasha234\HwPatterns\Cooking\Enum\CookingStatus;

class CookingProxy implements CookingInterface
{
    public function __construct(
        protected CookingProcess $realProcess,
    ) {}

    public function cook(): void
    {
        echo "⚙️ [Прокси] Пре-событие: Проверка наличия ингредиентов...\n";
        sleep(1);
        echo "⚙️ [Прокси] Ингредиенты в наличии. Начинаем готовку.\n";

        $this->realProcess->cook();

        $this->realProcess->setStatus(CookingStatus::QUALITY_CHECK);

        // Рандомно решаем, прошел ли продукт проверку
        if (rand(0, 5) > 0) { // 5/6 шанс на успех
            echo "✅ [Прокси] Пост-событие: Проверка качества пройдена.\n";
            $this->realProcess->setStatus(CookingStatus::READY);
        } else {
            echo "❌ [Прокси] Пост-событие: Продукт не соответствует стандарту!\n";
            $this->realProcess->setStatus(CookingStatus::DISPOSED);
        }
        sleep(1);
        $this->realProcess->setStatus(CookingStatus::SERVED);
    }
}