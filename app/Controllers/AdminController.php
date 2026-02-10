<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Middleware;

final class AdminController extends Controller
{
    public function dashboard(): void
    {
        Middleware::admin();

        $this->view('admin/dashboard', [
            'title' => 'Admin Dashboard',
        ]);
    }
}
