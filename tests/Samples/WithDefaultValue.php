<?php

namespace MlaxWong\DI\Tests\Samples;

class WithDefaultValue
{
    public function __construct(public Foo $foo, public Bar $bar, public int $count = 1, public string $name = 'name', public bool $isActive = false)
    {
    }
}
