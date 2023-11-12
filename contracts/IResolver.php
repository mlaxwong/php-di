<?php

namespace MlaxWong\DI\Contracts;

interface IResolver
{
    public function getParams(): array;
    public function setParams(array $params): IResolver;
    public function getNeeds(): array;
    public function resolve(array $params = []): mixed;
}
