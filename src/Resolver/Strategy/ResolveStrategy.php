<?php

namespace MlaxWong\DI\Resolver\Strategy;

use ReflectionParameter;

abstract class ResolveStrategy
{
    protected ?array $reflectionParams = null;
    protected array $params = [];
    protected array $solvedParams = [];

    public function __construct(protected mixed $context)
    {
        $this->paramsPlaceholder();
        $this->handleDefaultParams();
    }

    abstract function resolve(): mixed;

    /**
     * @return ReflectionParameter[]
     */
    public function getReflectionParams(): array
    {
        return $this->reflectionParams ?? $this->reflectionParams = $this->abstractReflectionParams();
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->resolveParams($params);
    }

    /**
     * @return ReflectionParameter[]
     */
    abstract protected function abstractReflectionParams(): array;

    public function getNeeds(): array
    {
        return array_values(array_diff(array_keys($this->getReflectionParams()), $this->solvedParams));
    }

    protected function paramsPlaceholder(): void
    {
        $reflectionParams = $this->getReflectionParams();
        $this->params = array_combine(array_keys($reflectionParams), array_pad([], count($reflectionParams), null));
    }

    protected function handleDefaultParams(): void
    {
        foreach ($this->getReflectionParams() as $name => $reflectionParam) {
            if ($reflectionParam->isDefaultValueAvailable()) {
                $this->resolveParams([$name => $reflectionParam->getDefaultValue()]);
            }
        }
    }

    protected function resolveParams(array $params): void
    {
        $this->params = array_merge($this->params, $params);
        $this->solvedParams = array_merge($this->solvedParams, array_keys($params));
    }
}
