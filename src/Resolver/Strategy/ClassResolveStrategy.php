<?php

namespace MlaxWong\DI\Resolver\Strategy;

use ReflectionClass;
use ReflectionParameter;

class ClassResolveStrategy extends ResolveStrategy
{
    protected function abstractReflectionParams(): array
    {
        $reflection = new ReflectionClass($this->context);
        $constructor = $reflection->getConstructor();
        $params = $constructor?->getParameters() ?? [];
        $names = array_map(fn(ReflectionParameter $param) => $param->getName(), $params);
        return array_combine($names, $params);
    }
}
