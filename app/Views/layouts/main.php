<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Blog', ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>

<header>
    <h1>PHP MVC Blog</h1>
    <hr>
</header>

<main>
    <?= $content ?>
</main>

<footer>
    <hr>
    <small>© <?= date('Y') ?> Blog</small>
</footer>

</body>
</html>
