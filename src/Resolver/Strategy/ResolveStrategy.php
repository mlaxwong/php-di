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

    /**
     * @return ReflectionParameter[]
     */
    abstract protected function abstractReflectionParams(): array;

    public function getNeeds(): array
    {
        return [];
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
                $this->solveParams([$name => $reflectionParam->getDefaultValue()]);
            }
        }
    }

    protected function solveParams(array $params): void
    {
        $this->params = array_merge($this->params, $params);
        $this->solvedParams = array_merge($this->solvedParams, array_keys($params));
    }
}
