<?php

namespace MlaxWong\DI\Tests\Feature\Container;

use PHPUnit\Framework\TestCase;

class Container07DefineWithParamLaterTest extends TestCase
{
    public function testBindingWithDefineWithoutAutoInjectionShouldResolvable(): void
    {
        $this->assertTrue(false);
    }

    public function testBindingWithDefineAutoInjectionShouldResolvable(): void
    {
        $this->assertTrue(false);
    }

    public function testBindingWithDefineParamsLaterShouldResolvable(): void
    {
        $this->assertTrue(false);
    }

    public function testBindingWithDefineWithMissingParamShouldThrowException(): void
    {
        $this->assertTrue(false);
    }
}