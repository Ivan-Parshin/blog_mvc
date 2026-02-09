<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\User;

final class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('auth/login', ['title' => 'Вход']);
    }

    public function login(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (Auth::attempt($email, $password)) {
            header('Location: /');
            exit;
        }

        $this->view('auth/login', [
            'title' => 'Вход',
            'error' => 'Неверный email или пароль',
        ]);
    }

    public function showRegister(): void
    {
        $this->view('auth/register', ['title' => 'Регистрация']);
    }

    public function register(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (User::findByEmail($email)) {
            $this->view('auth/register', [
                'title' => 'Регистрация',
                'error' => 'Пользователь уже существует',
            ]);
            return;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $userId = User::create($email, $hash);

        Auth::login($userId);

        header('Location: /');
        exit;
    }

    public function logout(): void
    {
        Auth::logout();
        header('Location: /');
        exit;
    }
}
