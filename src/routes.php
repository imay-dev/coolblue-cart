<?php

use Coolblue\Core\Container;
use Coolblue\Core\Router;

$container = new Container();
$router    = new Router($container);

$router->register('get', '/', ['Coolblue\App\Controllers\CartController', 'index']);
