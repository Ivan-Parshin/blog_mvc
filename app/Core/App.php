<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;


final class App
{
    public function run(): void
    {
        $router = new Router();

        // Public pages
        $router->get('/', [HomeController::class, 'index']);
        $router->get('/posts', [PostController::class, 'index']);

        // Auth
        $router->get('/login', [AuthController::class, 'showLogin']);
        $router->post('/login', [AuthController::class, 'login']);

        $router->get('/register', [AuthController::class, 'showRegister']);
        $router->post('/register', [AuthController::class, 'register']);

        $router->get('/logout', [AuthController::class, 'logout']);

        $router->get('/admin', [AdminController::class, 'dashboard']);

        $router->dispatch(
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI']
        );
    }
}
