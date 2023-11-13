<?php

namespace MlaxWong\DI\Exceptions;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class NotFoundException extends Exception implements ContainerExceptionInterface
{
}
