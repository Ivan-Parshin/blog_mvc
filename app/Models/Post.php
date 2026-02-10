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

        return $pdo
            ->query('SELECT * FROM posts ORDER BY id DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
        $stmt->execute(['id' => $id]);

        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        return $post ?: null;
    }

    public static function create(string $title, string $content): int
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            'INSERT INTO posts (title, content) VALUES (:title, :content)'
        );

        $stmt->execute([
            'title' => $title,
            'content' => $content,
        ]);

        return (int) $pdo->lastInsertId();
    }

    public static function update(int $id, string $title, string $content): void
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare(
            'UPDATE posts SET title = :title, content = :content WHERE id = :id'
        );

        $stmt->execute([
            'id' => $id,
            'title' => $title,
            'content' => $content,
        ]);
    }

    public static function delete(int $id): void
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare('DELETE FROM posts WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
