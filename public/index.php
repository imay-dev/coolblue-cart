<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Coolblue\App\ShoppingCart;

define('ROOT_PATH', __DIR__ . '/..');
define('APP_PATH', ROOT_PATH . '/src');

echo (new ShoppingCart())->render();
