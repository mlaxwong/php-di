<?php

namespace MlaxWong\DI\Resolver\Strategy;

use ReflectionClass;
use ReflectionParameter;

class ClassResolveStrategy extends ResolveStrategy
{
    private ?ReflectionClass $reflection = null;

    private function getReflection(): ReflectionClass
    {
        return $this->reflection ?? $this->reflection = new ReflectionClass($this->context);
    }

    protected function abstractReflectionParams(): array
    {
        $constructor = $this->getReflection()->getConstructor();
        $params = $constructor?->getParameters() ?? [];
        $names = array_map(fn(ReflectionParameter $param) => $param->getName(), $params);
        return array_combine($names, $params);
    }

    public function resolve(): mixed
    {
        return $this->getParams() ?  $this->getReflection()->newInstanceArgs($this->getParams()) : $this->getReflection()->newInstance();
    }
}
