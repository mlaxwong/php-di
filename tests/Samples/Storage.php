<?php

namespace MlaxWong\DI\Tests\Samples;

class Storage implements IStorage
{
    public function __construct(private ICache $cache)
    {
    }

    public function test(): void
    {
        $this->cache->test();
    }
}
