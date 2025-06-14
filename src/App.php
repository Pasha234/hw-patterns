<?php

namespace Pasha234\HwPatterns;

use DI\Container;
use Pasha234\HwPatterns\Proxy\CookingProxy;
use Pasha234\HwPatterns\Cooking\CookingProcess;
use Pasha234\HwPatterns\Decorators\OnionDecorator;
use Pasha234\HwPatterns\Decorators\PepperDecorator;
use Pasha234\HwPatterns\Entities\FoodItemInterface;
use Pasha234\HwPatterns\Decorators\LettuceDecorator;
use Pasha234\HwPatterns\Observers\NotificationObserver;
use Pasha234\HwPatterns\AbstractFactory\FoodFactoryInterface;

class App
{
    public function __construct(
        private FoodFactoryInterface $foodFactory,
        private Container $container
    ) {}

    public function run(): void
    {
        echo "========================================\n";
        echo " Добро пожаловать в наш Фаст-Фуд!\n";
        echo "========================================\n";

        while (true) {
            $foodItem = $this->chooseBaseProduct();
            if (!$foodItem) {
                echo "До свидания!\n";
                break;
            }

            $foodItem = $this->addIngredients($foodItem);

            echo "\n--- Ваш заказ ---\n";
            echo "Описание: " . $foodItem->getDescription() . "\n";
            printf("Итоговая цена: $%.2f\n", $foodItem->getPrice());
            echo "-----------------\n\n";

            $this->startCookingProcess();

            echo "\nХотите сделать еще один заказ? (yes/no): ";
            if (trim(fgets(STDIN)) !== 'yes') {
                echo "Спасибо за ваш заказ! До свидания!\n";
                break;
            }
        }
    }

    private function chooseBaseProduct(): ?FoodItemInterface
    {
        echo "\nЧто желаете заказать?\n";
        echo "1: Бургер\n";
        echo "2: Сэндвич\n";
        echo "3: Хот-дог\n";
        echo "4: Пицца\n";
        echo "Введите q для выхода.\n";
        echo "Ваш выбор: ";

        $choice = trim(fgets(STDIN));

        return match ($choice) {
            '1' => $this->foodFactory->createBurger(),
            '2' => $this->foodFactory->createSandwich(),
            '3' => $this->foodFactory->createHotDog(),
            '4' => $this->foodFactory->createPizza(),
            default => null,
        };
    }

    private function addIngredients(FoodItemInterface $foodItem): FoodItemInterface
    {
        while (true) {
            echo "\nДобавить ингредиент?\n";
            echo "1: Салат ($0.50)\n";
            echo "2: Лук ($0.30)\n";
            echo "3: Перец ($0.40)\n";
            echo "Введите 'done' для завершения.\n";
            echo "Ваш выбор: ";
            $choice = trim(fgets(STDIN));

            if ($choice === 'done') {
                break;
            }

            $decoratorClass = match ($choice) {
                '1' => LettuceDecorator::class,
                '2' => OnionDecorator::class,
                '3' => PepperDecorator::class,
                default => null,
            };

            if ($decoratorClass) {
                $foodItem = $this->container->make($decoratorClass, ['foodItem' => $foodItem]);
                echo "Добавлено! Текущий заказ: " . $foodItem->getDescription() . "\n";
            } else {
                echo "Неверный выбор.\n";
            }
        }
        return $foodItem;
    }

    private function startCookingProcess(): void
    {
        echo "--- Начинаем процесс приготовления ---\n";

        $observer = $this->container->make(NotificationObserver::class);

        $cookingProcess = $this->container->make(CookingProcess::class);
        $cookingProcess->attach($observer);

        $cooker = $this->container->make(CookingProxy::class, ['realProcess' => $cookingProcess]);

        $cooker->cook();

        echo "--- Процесс приготовления завершен ---\n";
    }
}
