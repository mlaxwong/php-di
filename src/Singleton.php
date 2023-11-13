<?php

namespace MlaxWong\DI;

use MlaxWong\DI\Contracts\IResolvable;
use MlaxWong\DI\Resolver\Resolver;

class Singleton implements IResolvable
{
    private mixed $resolved = null;

    public function __construct(private Resolver $resolver)
    {
    }

    public function resolve(array $params = []): mixed
    {
        return $this->resolved ?? $this->resolved = $this->resolver->resolve($params);
    }
}
