<?php

namespace MlaxWong\DI\Tests\Samples;

class Database
{
    public function __construct(
        public string $host,
        public string $port,
        public string $user,
        public string $pass,
    ) {
    }
}
