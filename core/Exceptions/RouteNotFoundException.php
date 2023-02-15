<?php

declare(strict_types = 1);

namespace Coolblue\Core\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = '404 Not Found';
}
