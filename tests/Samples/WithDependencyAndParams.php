<?php

namespace MlaxWong\DI\Tests\Samples;

class WithDependencyAndParams
{
    public function __construct(public Foo $foo, public Bar $bar, public int $count, public string $name)
    {
    }
}
