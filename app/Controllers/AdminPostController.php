<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Middleware;
use App\Models\Post;

final class AdminPostController extends Controller
{
    public function index(): void
    {
        Middleware::admin();

        $posts = Post::all();

        $this->view('admin/posts/index', [
            'title' => 'Управление постами',
            'posts' => $posts,
        ]);
    }

    public function createForm(): void
    {
        Middleware::admin();

        $this->view('admin/posts/create', [
            'title' => 'Создать пост',
        ]);
    }

    public function create(): void
    {
        Middleware::admin();

        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        Post::create($title, $content);

        header('Location: /admin/posts');
        exit;
    }

    public function editForm(): void
    {
        Middleware::admin();

        $id = (int) ($_GET['id'] ?? 0);
        $post = Post::find($id);

        if (!$post) {
            http_response_code(404);
            echo 'Post not found';
            return;
        }

        $this->view('admin/posts/edit', [
            'title' => 'Редактировать пост',
            'post' => $post,
        ]);
    }

    public function update(): void
    {
        Middleware::admin();

        $id = (int) ($_POST['id'] ?? 0);
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        Post::update($id, $title, $content);

        header('Location: /admin/posts');
        exit;
    }

    public function delete(): void
    {
        Middleware::admin();

        $id = (int) ($_POST['id'] ?? 0);

        Post::delete($id);

        header('Location: /admin/posts');
        exit;
    }
}
