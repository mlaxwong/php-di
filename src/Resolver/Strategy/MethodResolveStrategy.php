<?php

namespace MlaxWong\DI\Resolver\Strategy;

use ReflectionMethod;
use ReflectionParameter;

class MethodResolveStrategy extends ResolveStrategy
{
    protected function abstractReflectionParams(): array
    {
        [$class, $method] = $this->context;
        $reflection = new ReflectionMethod($class, $method);
        $params = $reflection->getParameters();
        $names = array_map(fn(ReflectionParameter $param) => $param->getName(), $params);
        return array_combine($names, $params);
    }
}
