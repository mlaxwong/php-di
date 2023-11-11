<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use PHPUnit\Framework\TestCase;

class Container01BindingAndResolveTest extends TestCase
{
    public function testBindingWithOnlyClassnameShouldResolvable(): void
    {
        $this->assertTrue(false);
    }

    public function testBindingWithContractAndClassNameShouldResolvable(): void
    {
        $this->assertTrue(false);
    }

    public function testBindingWithContractAndDefinitionShouldResolvable(): void
    {
        $this->assertTrue(false);
    }

    public function testGetNotFoundShouldThrowException(): void
    {
        $this->assertTrue(false);
    }

    public function testSetExistingShouldThrowException(): void
    {
        $this->assertTrue(false);
    }
}
