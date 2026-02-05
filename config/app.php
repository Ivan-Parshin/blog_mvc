<?php

return [
    'name' => $_ENV['APP_NAME'] ?? 'Blog',
    'env' => $_ENV['APP_ENV'] ?? 'production',
    'debug' => (bool) ($_ENV['APP_DEBUG'] ?? false),
];
