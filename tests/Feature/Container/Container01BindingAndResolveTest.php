<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use MlaxWong\DI\Container;
use MlaxWong\DI\Exceptions\NotFoundException;
use MlaxWong\DI\Tests\Samples\Cache;
use MlaxWong\DI\Tests\Samples\Foo;
use MlaxWong\DI\Tests\Samples\ICache;
use PHPUnit\Framework\TestCase;

class Container01BindingAndResolveTest extends TestCase
{
    public function testBindingWithOnlyClassnameShouldResolvable(): void
    {
        $container = new Container();
        $container->set(Foo::class);
        $this->assertEquals(new Foo(), $container->get(Foo::class));
    }

    public function testBindingWithContractAndClassNameShouldResolvable(): void
    {
        $container = new Container();
        $container->set(ICache::class, Cache::class);
        $this->assertEquals(new Cache(), $container->get(ICache::class));
    }

    public function testBindingWithContractAndDefinitionShouldResolvable(): void
    {
        $container = new Container();
        $container->set(ICache::class, fn () => new Cache());
        $this->assertEquals(new Cache(), $container->get(ICache::class));
        ;
    }

    public function testGetNotFoundShouldThrowException(): void
    {
        $this->expectException(NotFoundException::class);
        $container = new Container();
        $container->get(ICache::class);
    }

    // public function testSetExistingShouldThrowException(): void
    // {
    //     $this->assertTrue(false);
    // }
}
