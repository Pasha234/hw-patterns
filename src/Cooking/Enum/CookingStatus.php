<?php

namespace Pasha234\HwPatterns\Cooking\Enum;

enum CookingStatus: string
{
    case ORDERED = 'Заказ принят';
    case COOKING = 'Готовится';
    case QUALITY_CHECK = 'Проверка качества';
    case READY = 'Готов к выдаче';
    case SERVED = 'Выдан клиенту';
    case DISPOSED = 'Утилизирован';
}