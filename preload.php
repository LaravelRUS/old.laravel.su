<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$classes = __DIR__ . '/vendor/composer/autoload_classmap.php';

foreach ($classes as $class => $pathname) {
    \opcache_compile_file($pathname);
}
