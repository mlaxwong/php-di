<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use MlaxWong\DI\Container;
use MlaxWong\DI\Tests\Samples\Database;
use PHPUnit\Framework\TestCase;

class Container02SingletonTest extends TestCase
{
    public function testSingletonShouldPromiseSameInstance(): void
    {
        $container = new Container();
        
        $container->set('db.host', 'localhost');
        $container->set('db.user', 'user');
        $container->set('db.pass', 'pass');
        $container->set('db.port', 'pass');

        $container->singleton(Database::class, function () use ($container) {
            return new Database(
                $container->get('db.host'),
                $container->get('db.port'),
                $container->get('db.user'),
                $container->get('db.pass'),
            );
        });

        $a = $container->get(Database::class);
        $b = $container->get(Database::class);

        $this->assertSame($a, $b);
    }
}
