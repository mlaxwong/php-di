<?php

namespace MlaxWong\DI\Tests\Unit;

use MlaxWong\DI\Container;
use MlaxWong\DI\Tests\Samples\Bar;
use MlaxWong\DI\Tests\Samples\Foo;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function testAutoInjection()
    {
        $container = new Container();

        $container->set(Foo::class);
        $container->set(Bar::class);

        $this->assertEquals(new Bar(new Foo()), $container->get(Bar::class));
    }
}
