<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\AdminPostController;


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

        $router->get('/admin/posts', [AdminPostController::class, 'index']);
        $router->get('/admin/posts/create', [AdminPostController::class, 'createForm']);
        $router->post('/admin/posts/create', [AdminPostController::class, 'create']);

        $router->get('/admin/posts/edit', [AdminPostController::class, 'editForm']);
        $router->post('/admin/posts/edit', [AdminPostController::class, 'update']);

        $router->post('/admin/posts/delete', [AdminPostController::class, 'delete']);

        $router->dispatch(
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI']
        );
    }
}
