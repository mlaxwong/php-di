<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use PHPUnit\Framework\TestCase;

class Container06CallableAutoInjectionTest extends TestCase
{
    public function testCallShouldAutowiredAndResolve(): void
    {
        $this->assertTrue(false);
    }

    public function testCallWithExtraParamsShouldAutowiredAndResolve(): void
    {
        $this->assertTrue(false);
    }

    public function testCallWithUndefinedContractShouldThrowException(): void
    {
        $this->assertTrue(false);
    }
}