<?php

namespace MlaxWong\DI\Contracts;

use Psr\Container\ContainerInterface;

interface IContainer extends ContainerInterface
{
    public function singleton(string $id, mixed $value): void;
    public function set(string $id, mixed $value = null): void;
}
