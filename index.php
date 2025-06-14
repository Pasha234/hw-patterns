<?php

require 'vendor/autoload.php';

use DI\ContainerBuilder;
use Pasha234\HwPatterns\App;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions('config.php');
$container = $containerBuilder->build();

$app = $container->get(App::class);

$app->run();