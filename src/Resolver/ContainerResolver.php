<?php

namespace MlaxWong\DI\Resolver;

use MlaxWong\DI\Contracts\IContainer;
use ReflectionUnionType;

class ContainerResolver extends Resolver
{
    public function __construct(private IContainer $container, mixed $context)
    {
        parent::__construct($context);
        $this->handleAutoInjection();
    }

    private function handleAutoInjection(): void
    {
        $needs = $this->strategy->getNeeds();
        $reflectionParams = $this ->strategy->getReflectionParams();

        $injection = [];
        foreach ($needs as $name) {
            $reflectionParam = $reflectionParams[$name];
            $type = $reflectionParam->getType();
            $id = (string) $type;

            if ($type instanceof ReflectionUnionType) {
                continue; // ignore union type
            }

            if ($this->container->has($id)) {
                $injection[$name] = $this->container->get($id);
            }
        }

        if ($injection) {
            $this->strategy->setParams($injection);
        }
    }
}
