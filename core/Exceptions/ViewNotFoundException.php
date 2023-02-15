<?php

declare(strict_types = 1);

namespace Coolblue\Core\Exceptions;

class ViewNotFoundException extends \Exception
{
    protected $message = 'View not found';
}
