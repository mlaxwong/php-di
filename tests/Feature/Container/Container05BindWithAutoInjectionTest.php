<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use PHPUnit\Framework\TestCase;

class Container05BindWithAutoInjectionTest extends TestCase
{
    public function testBindingShouldAutowiredIfContractDefined(): void 
    {
        $this->assertTrue(false);
    }

    public function testBindingWithUndefinedContractShouldThrowException(): void
    {
        $this->assertTrue(false);
    }

    public function testBindingWithCallableShouldAutowired(): void
    {
        $this->assertTrue(false);
    }
}