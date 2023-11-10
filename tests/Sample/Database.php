<?php

namespace MlaxWong\DI\Tests\Samples;

class Database
{
    public function __construct(
        private string $host,
        private string $port,
        private string $user,
        private string $pass,
    ) {
    }
}
