<?php

namespace MlaxWong\DI\Tests\Unit\Resolver;

use MlaxWong\DI\Resolver\Resolver;
use MlaxWong\DI\Tests\Samples\Bar;
use MlaxWong\DI\Tests\Samples\Foo;
use MlaxWong\DI\Tests\Samples\WithDependencyAndParams;
use PHPUnit\Framework\TestCase;

class ResolverResolveTest extends TestCase
{
    public function testResolveWithoutParams()
    {
        $resolver = new Resolver(Foo::class);
        $class = $resolver->resolve();
        $this->assertEquals(new Foo(), $class);
    }

    public function testResolveWithParams()
    {
        $resolver = new Resolver(Bar::class);
        $resolver->setParams(['foo' => new Foo()]);
        $class = $resolver->resolve();
        $this->assertEquals(new Bar(new Foo()), $class);
    }

    public function testResolveWithMultipleSetParams()
    {
        $resolver = new Resolver(WithDependencyAndParams::class);
        $resolver->setParams(['foo' => new Foo()]);
        $resolver->setParams(['bar' => new Bar(new Foo())]);
        $resolver->setParams(['count' => 5, 'name' => 'Mlax']);
        $class = $resolver->resolve();
        $this->assertEquals(new WithDependencyAndParams(new Foo(), new Bar(new Foo()), 5, 'Mlax'), $class);
    }
}
