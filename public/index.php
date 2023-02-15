<?php

declare(strict_types = 1);

use Coolblue\Core\App;
use Coolblue\Core\Container;
use Coolblue\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

define('ROOT_PATH', __DIR__ . '/..');
define('APP_PATH', ROOT_PATH . '/src');
define('VIEW_PATH', ROOT_PATH .'/template');

$container = new Container();
$router    = new Router($container);

include(APP_PATH . '/routes.php');

(new App(
    $container,
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
))->boot()->run();
