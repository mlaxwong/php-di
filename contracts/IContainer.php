<?php

namespace MlaxWong\DI;

use Psr\Container\ContainerInterface;

interface IContainer extends ContainerInterface
{
    public function singaton(string $id, mixed $value): void;
    public function set(string $id, mixed $value): void;
}
