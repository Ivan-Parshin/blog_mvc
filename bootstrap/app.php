<?php

declare(strict_types=1);

use App\Core\Env;

$rootPath = dirname(__DIR__);

// Загружаем .env
Env::load($rootPath);

// Глобальные настройки PHP
if (Env::get('APP_DEBUG', false)) {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
}
