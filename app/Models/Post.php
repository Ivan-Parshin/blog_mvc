<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

final class Post
{
    public static function all(): array
    {
        $pdo = Database::connection();

        $stmt = $pdo->query('SELECT id, title, content, created_at FROM posts ORDER BY created_at DESC');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
