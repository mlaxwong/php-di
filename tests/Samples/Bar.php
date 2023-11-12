<?php

namespace MlaxWong\DI\Tests\Samples;

class Bar
{
    public function __construct(private Foo $foo)
    {
    }
}
