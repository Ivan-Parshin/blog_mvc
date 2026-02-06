<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

final class HomeController extends Controller
{
    public function index(): void
    {
        $pdo = Database::connection();

        $stmt = $pdo->query('SELECT NOW() as server_time');
        $row = $stmt->fetch();

        $this->view('home/index', [
            'title' => 'Главная страница блога',
            'message' => 'Подключение к БД успешно.',
        ]);
    }
}
