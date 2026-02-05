<?php
$config = require dirname(__DIR__, 3) . '/config/app.php';
$appName = $config['name'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($appName, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>

<header>
    <h1><?= htmlspecialchars($appName, ENT_QUOTES, 'UTF-8') ?></h1>
    <hr>
</header>

<main>
    <?= $content ?>
</main>

<footer>
    <hr>
    <small>© <?= date('Y') ?> </small>
</footer>

</body>
</html>
