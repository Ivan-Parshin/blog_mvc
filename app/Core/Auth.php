<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\User;

final class Auth
{
    private const SESSION_KEY = 'user_id';

    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function attempt(string $email, string $password): bool
    {
        self::start();

        $user = User::findByEmail($email);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        $_SESSION[self::SESSION_KEY] = (int) $user['id'];

        return true;
    }

    public static function login(int $userId): void
    {
        self::start();
        $_SESSION[self::SESSION_KEY] = $userId;
    }

    public static function user(): ?array
    {
        self::start();

        if (!isset($_SESSION[self::SESSION_KEY])) {
            return null;
        }

        return User::findById((int) $_SESSION[self::SESSION_KEY]);
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function logout(): void
    {
        self::start();
        unset($_SESSION[self::SESSION_KEY]);
    }
}
