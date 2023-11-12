<?php

namespace MlaxWong\DI\Resolver;

use Closure;
use MlaxWong\DI\Resolver\Strategy\ClassResolveStrategy;
use MlaxWong\DI\Resolver\Strategy\ClosureResolveStrategy;
use MlaxWong\DI\Resolver\Strategy\MethodResolveStrategy;
use MlaxWong\DI\Resolver\Strategy\ResolveStrategy;

class ResolverStrategyFactory
{
    public static function getStrategy(mixed $context): ResolveStrategy
    {
        return match (true) {
            $context instanceof Closure => new ClosureResolveStrategy($context),
            is_array($context) => new MethodResolveStrategy($context),
            default => new ClassResolveStrategy($context),
        };
    }
}
