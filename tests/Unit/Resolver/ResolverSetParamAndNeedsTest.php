<?php

namespace MlaxWong\DI\Tests\Unit\Resolver;

use MlaxWong\DI\Resolver\Resolver;
use MlaxWong\DI\Tests\Samples\Bar;
use MlaxWong\DI\Tests\Samples\Foo;
use MlaxWong\DI\Tests\Samples\WithDependencyAndParams;
use PHPUnit\Framework\TestCase;

class ResolverSetParamAndNeedsTest extends TestCase
{
    public function testSetParamAndNeeds()
    {
        $resolver = new Resolver(WithDependencyAndParams::class);
        $this->assertEquals(['foo', 'bar', 'count', 'name'], $resolver->getNeeds());
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => null, 'name' => null], $resolver->getParams());

        $resolver->setParams(['count' => 2]);
        $this->assertEquals(['foo', 'bar', 'name'], $resolver->getNeeds());
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => 2, 'name' => null], $resolver->getParams());

        $resolver->setParams(['foo' => new Foo(), 'name' => 'Mlax']);
        $this->assertEquals(['bar'], $resolver->getNeeds());
        $this->assertEquals(['foo' => new Foo(), 'bar' => null, 'count' => 2, 'name' => 'Mlax'], $resolver->getParams());

        $resolver->setParams(['count' => 5]);
        $this->assertEquals(['bar'], $resolver->getNeeds());
        $this->assertEquals(['foo' => new Foo(), 'bar' => null, 'count' => 5, 'name' => 'Mlax'], $resolver->getParams());

        $resolver->setParams(['bar' => new Bar(new Foo())]);
        $this->assertEquals([], $resolver->getNeeds());
        $this->assertEquals(['foo' => new Foo(), 'bar' => new Bar(new Foo()), 'count' => 5, 'name' => 'Mlax'], $resolver->getParams());
    }
}
