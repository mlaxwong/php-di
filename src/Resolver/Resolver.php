<?php

namespace MlaxWong\DI\Resolver;

use MlaxWong\DI\Contracts\IResolver;
use MlaxWong\DI\Resolver\Strategy\ResolveStrategy;

class Resolver implements IResolver
{
    private ResolveStrategy $strategy;

    public function __construct(mixed $context)
    {
        $this->strategy = ResolverStrategyFactory::getStrategy($context);
    }

    public function getParams(): array
    {
        return $this->strategy->getParams();
    }

    public function setParams(array $params): IResolver
    {
        $this->strategy->setParams($params);
        return $this;
    }

    public function getNeeds(): array
    {
        return $this->strategy->getNeeds();
    }

    public function resolve(array $params = []): mixed
    {
        return null;
    }
}
