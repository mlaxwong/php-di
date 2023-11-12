<?php

namespace MlaxWong\DI\Resolver\Strategy;

use ReflectionFunction;
use ReflectionParameter;

class ClosureResolveStrategy extends ResolveStrategy
{
    protected function abstractReflectionParams(): array
    {
        $reflection = new ReflectionFunction($this->context);
        $params = $reflection->getParameters();
        $names = array_map(fn(ReflectionParameter $param) => $param->getName(), $params);
        return array_combine($names, $params);
    }
}
