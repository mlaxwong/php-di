<?php

namespace MlaxWong\DI\Tests\Unit;

use MlaxWong\DI\Contracts\IContainer;
use MlaxWong\DI\Resolver\ContainerResolver;
use MlaxWong\DI\Tests\Samples\Bar;
use MlaxWong\DI\Tests\Samples\Foo;
use PHPUnit\Framework\TestCase;

class ContainerResolverTest extends TestCase
{
    public function testAutoInjection()
    {
        $container = $this->createMock(IContainer::class);

        $container->expects($this->once())
            ->method('has')
            ->with(Foo::class)
            ->willReturn(true);

        $container->expects($this->once())
            ->method('get')
            ->with(Foo::class)
            ->willReturn(new Foo());


        $resolver = new ContainerResolver($container, Bar::class);
        $this->assertEquals(new Bar(new Foo()), $resolver->resolve());
    }
}
