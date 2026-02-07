<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;

final class PostController extends Controller
{
    public function index(): void
    {
        $posts = Post::all();

        $this->view('posts/index', [
            'title' => 'Список постов',
            'posts' => $posts,
        ]);
    }
}
