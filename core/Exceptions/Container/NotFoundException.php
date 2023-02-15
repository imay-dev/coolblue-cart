<?php

declare(strict_types = 1);

namespace Coolblue\Core\Exceptions\Container;

use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends \Exception implements NotFoundExceptionInterface
{
}
