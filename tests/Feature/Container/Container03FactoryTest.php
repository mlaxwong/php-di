<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use MlaxWong\DI\Container;
use MlaxWong\DI\Tests\Samples\Foo;
use PHPUnit\Framework\TestCase;

class Container03FactoryTest extends TestCase
{
    public function testFactoryShouldAlwaysCreateNewInstace(): void
    {
        $container = new Container();
        $container->set(Foo::class);
        $a = $container->get(Foo::class);
        $b = $container->get(Foo::class);
        $this->assertNotSame($a, $b);
    }
}
