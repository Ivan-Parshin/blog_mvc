<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\HomeController;

final class App
{
    public function run(): void
    {
        $router = new Router();

        $router->get('/', [HomeController::class, 'index']);

        $router->dispatch(
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI']
        );
    }
}
