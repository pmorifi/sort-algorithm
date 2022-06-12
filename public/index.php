<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;
use app\controllers\AlgorithmController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [AlgorithmController::class, 'index']);

$app->router->post('/', [AlgorithmController::class, 'store']);

$app->run();