<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use MlaxWong\DI\Container;
use MlaxWong\DI\Tests\Samples\Cache;
use MlaxWong\DI\Tests\Samples\ICache;
use MlaxWong\DI\Tests\Samples\IStorage;
use MlaxWong\DI\Tests\Samples\Storage;
use PHPUnit\Framework\TestCase;
use Throwable;

class Container05BindWithAutoInjectionTest extends TestCase
{
    public function testBindingShouldAutowiredIfContractDefined(): void
    {
        $container = new Container();
        $container->set(ICache::class, Cache::class);
        $container->set(IStorage::class, Storage::class);
        $this->assertEquals(new Storage(new Cache()), $container->get(IStorage::class));
    }

    public function testBindingWithUndefinedContractShouldThrowException(): void
    {
        $this->expectException(Throwable::class);
        $container = new Container();
        $container->set(IStorage::class, Storage::class);
        $container->get(IStorage::class);
    }

    public function testBindingWithCallableShouldAutowired(): void
    {
        $this->assertTrue(false);
    }
}
