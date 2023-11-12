<?php

namespace MlaxWong\DI\Contracts;

interface IResolver
{
    public function getParams(): array;
    public function resolve(array $params = []): mixed;
}
