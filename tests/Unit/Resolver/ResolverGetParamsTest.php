<?php

namespace MlaxWong\DI\Tests\Unit\Resolver;

use MlaxWong\DI\Resolver\Resolver;
use MlaxWong\DI\Tests\Samples\Bar;
use MlaxWong\DI\Tests\Samples\Foo;
use MlaxWong\DI\Tests\Samples\WithDefaultValue;
use MlaxWong\DI\Tests\Samples\WithDependency;
use MlaxWong\DI\Tests\Samples\WithDependencyAndParams;
use MlaxWong\DI\Tests\Samples\WithoutConstructor;
use PHPUnit\Framework\TestCase;

class ResolverGetParams extends TestCase
{
    public function testGetParamsWithClassContextWithoutConstructor(): void
    {
        $resolver = new Resolver(WithoutConstructor::class);
        $this->assertEquals([], $resolver->getParams());
    }

    public function testGetParamsWithClassContextWithDependency(): void
    {
        $resolver = new Resolver(WithDependency::class);
        $this->assertEquals(['foo' => null, 'bar' => null], $resolver->getParams());
    }

    public function testGetParamsWithClassContextWithDenpencyAndParam(): void
    {
        $resolver = new Resolver(WithDependencyAndParams::class);
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => null, 'name' => null], $resolver->getParams());
    }

    public function testGetParamsWithClassContextWithDefaultValue(): void
    {
        $resolver = new Resolver(WithDefaultValue::class);
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => 1, 'name' => 'name', 'isActive' => false], $resolver->getParams());
    }

    public function testGetParamsWithClosureContextWithoutParams(): void
    {
        $resolver = new Resolver(function () {
        });
        $this->assertEquals([], $resolver->getParams());
    }

    public function testGetParamsWithClosureContextWithDependency(): void
    {
        $resolver = new Resolver(function (Foo $foo, Bar $bar) {
        });
        $this->assertEquals(['foo' => null, 'bar' => null], $resolver->getParams());
    }

    public function testGetParamsWithClosureContextWithDenpencyAndParam(): void
    {
        $resolver = new Resolver(function (Foo $foo, Bar $bar, int $count, string $name) {
        });
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => null, 'name' => null], $resolver->getParams());
    }

    public function testGetParamsWithClosureContextWithDefaultValue(): void
    {
        $resolver = new Resolver(function (Foo $foo, Bar $bar, int $count = 1, string $name = 'name', bool $isActive = false) {
        });
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => 1, 'name' => 'name', 'isActive' => false], $resolver->getParams());
    }

    //

    public function testGetParamsWithMethodContextWithoutParams(): void
    {
        $example = new class () {
            public function test(): void
            {
            }
        };
        $resolver = new Resolver([$example, 'test']);
        $this->assertEquals([], $resolver->getParams());
    }

    public function testGetParamsWithMethodContextWithDependency(): void
    {
        $example = new class () {
            public function test(Foo $foo, Bar $bar): void
            {
            }
        };
        $resolver = new Resolver([$example, 'test']);
        $this->assertEquals(['foo' => null, 'bar' => null], $resolver->getParams());
    }

    public function testGetParamsWithMethodContextWithDenpencyAndParam(): void
    {
        $example = new class () {
            public function test(Foo $foo, Bar $bar, int $count, string $name): void
            {
            }
        };
        $resolver = new Resolver([$example, 'test']);
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => null, 'name' => null], $resolver->getParams());
    }

    public function testGetParamsWithMethodContextWithDefaultValue(): void
    {
        $example = new class () {
            public function test(Foo $foo, Bar $bar, int $count = 1, string $name = 'name', bool $isActive = false): void
            {
            }
        };
        $resolver = new Resolver([$example, 'test']);
        $this->assertEquals(['foo' => null, 'bar' => null, 'count' => 1, 'name' => 'name', 'isActive' => false], $resolver->getParams());
    }
}
