<?php

namespace MlaxWong\DI\Tests\Samples;

class WithDependency
{
    public function __construct(public Foo $foo, public Bar $bar)
    {
    }
}
