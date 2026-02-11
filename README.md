# PHP MVC Blog

- PHP 8.1 (без фреймворков)
- MySQL + PDO
- MVC архитектура
- Роутинг
- Middleware (auth/admin)
- Роли пользователей
- CRUD постов
- Docker (nginx + php-fpm + mysql)
- .env конфигурация


- `app/Core` — ядро (Router, App, DB, Auth, Middleware)
- `app/Controllers` — контроллеры
- `app/Models` — модели
- `app/Views` — шаблоны
- `public/` — точка входа


cp .env.example .env
docker compose up -d --build


/admin
/admin/posts
