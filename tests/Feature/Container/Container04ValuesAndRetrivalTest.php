<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use MlaxWong\DI\Container;
use PHPUnit\Framework\TestCase;

class Container04ValuesAndRetrivalTest extends TestCase
{
    public function testSetIntValueShouldReturnInt(): void
    {
        $container = new Container();
        $container->set('value.int', 5);
        $this->assertEquals(5, $container->get('value.int'));
        $this->assertIsInt($container->get('value.int'));
    }

    public function testSetIntValueShouldReturnFloat(): void
    {
        $container = new Container();
        $container->set('value.float', 8.8);
        $this->assertEquals(8.8, $container->get('value.float'));
        $this->assertIsFloat($container->get('value.float'));
    }

    public function testSetStringValueShouldReturnString(): void
    {
        $container = new Container();
        $container->set('value.str', 'string');
        $this->assertEquals('string', $container->get('value.str'));
        $this->assertIsString($container->get('value.str'));
    }

    public function testSetBooleanValueShouldReturnBoolean(): void
    {
        $container = new Container();
        $container->set('value.bool', true);
        $this->assertEquals(true, $container->get('value.bool'));
        $this->assertIsBool($container->get('value.bool'));
    }

    public function testSetArrayValueShouldReturnArray(): void
    {
        $container = new Container();
        $container->set('value.arr', [1, 2, 3]);
        $this->assertEquals([1, 2, 3], $container->get('value.arr'));
        $this->assertIsArray($container->get('value.arr'));
    }
}
