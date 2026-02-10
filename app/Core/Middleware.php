<?php

declare(strict_types=1);

namespace App\Core;

final class Middleware
{
    public static function auth(): void
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }
    }

    public static function admin(): void
    {
        self::auth();

        $user = Auth::user();

        if (!$user || ($user['role'] ?? null) !== 'admin') {
            http_response_code(403);
            echo '403 Forbidden: Admin access required';
            exit;
        }
    }
}
