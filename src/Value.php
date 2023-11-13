<?php

namespace MlaxWong\DI;

use MlaxWong\DI\Contracts\IResolvable;

class Value implements IResolvable
{
    public function __construct(private mixed $value)
    {
    }

    public function resolve(array $params = []): mixed
    {
        return $this->value;
    }
}
