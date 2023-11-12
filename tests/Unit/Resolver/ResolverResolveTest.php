<?php

namespace MlaxWong\DI\Tests\Unit\Resolver;

use MlaxWong\DI\Resolver\Resolver;
use MlaxWong\DI\Tests\Samples\Foo;
use PHPUnit\Framework\TestCase;

class ResolverResolveTest extends TestCase
{
    public function testResolve()
    {
        $resolver = new Resolver(Foo::class);
        $class = $resolver->resolve();
        $this->assertEquals(new Foo(), $class);
    }
}
