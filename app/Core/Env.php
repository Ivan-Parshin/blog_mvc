<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;

final class Env
{
    public static function load(string $rootPath): void
    {
        if (!file_exists($rootPath . '/.env')) {
            return;
        }

        $dotenv = Dotenv::createImmutable($rootPath);
        $dotenv->load();
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $_SERVER[$key] ?? $default;
    }
}
