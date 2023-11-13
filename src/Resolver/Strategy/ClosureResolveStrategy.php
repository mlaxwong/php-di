<?php

namespace MlaxWong\DI\Resolver\Strategy;

use ReflectionFunction;
use ReflectionParameter;

class ClosureResolveStrategy extends ResolveStrategy
{
    private ?ReflectionFunction $reflection = null;

    private function getReflection(): ReflectionFunction
    {
        return $this->reflection ?? $this->reflection = new ReflectionFunction($this->context);
    }

    protected function abstractReflectionParams(): array
    {
        $params = $this->getReflection()->getParameters();
        $names = array_map(fn(ReflectionParameter $param) => $param->getName(), $params);
        return array_combine($names, $params);
    }

    public function resolve(): mixed
    {
        return $this->getParams() ? $this->getReflection()->invokeArgs($this->getParams()) : $this->getReflection()->invoke();
    }
}
