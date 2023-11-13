<?php

namespace MlaxWong\DI\Resolver\Strategy;

use ReflectionMethod;
use ReflectionParameter;

class MethodResolveStrategy extends ResolveStrategy
{
    private ?ReflectionMethod $reflection = null;

    private function getReflection(): ReflectionMethod
    {
        [$class, $method] = $this->context;
        return $this->reflection ?? $this->reflection = new ReflectionMethod($class, $method);
    }

    protected function abstractReflectionParams(): array
    {

        $params = $this->getReflection()->getParameters();
        $names = array_map(fn(ReflectionParameter $param) => $param->getName(), $params);
        return array_combine($names, $params);
    }

    public function resolve(): mixed
    {
        [$class] = $this->context;
        return $this->getParams() ? $this->getReflection()->invokeArgs($class, $this->getParams()) : $this->getReflection()->invoke($class);
    }
}
