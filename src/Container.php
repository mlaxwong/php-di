<?php

namespace MlaxWong\DI;

use MlaxWong\DI\Contracts\IContainer;
use MlaxWong\DI\Exceptions\NotFoundException;
use MlaxWong\DI\Resolver\ContainerResolver;

class Container implements IContainer
{
    public function __construct(
        /**
         * @var array<string, \MlaxWong\DI\Contracts\IResolvable>
         */
        private array $definitions = []
    ) {
    }

    public function set(string $id, mixed $value = null): void
    {
        $value = $value ?? $id;
        if ((is_string($value) && class_exists($value)) || is_callable($value)) {
            $this->definitions[$id] = new ContainerResolver($this, $value);
        } else {
            $this->definitions[$id] = new Value($value);
        }
    }

    public function singleton(string $id, mixed $value): void
    {
        $this->definitions[$id] = new Singleton(new ContainerResolver($this, $value));
    }

    public function get(string $id): mixed
    {

        if (!$this->has($id)) {
            throw new NotFoundException();
        }

        $resolver = $this->definitions[$id];
        return $resolver->resolve();
    }

    public function has(string $id): bool
    {
        return isset($this->definitions[$id]);
    }
}
