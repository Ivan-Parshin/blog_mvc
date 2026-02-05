<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/bootstrap/app.php';

use App\Core\App;

$app = new App();
$app->run();
