<?php

// Vercel's application bundle is read-only. Only generated files belong in /tmp.
$storage = sys_get_temp_dir().'/portfolio-storage';
foreach (['framework/views', 'framework/sessions', 'framework/cache/data', 'logs'] as $directory) {
    $path = $storage.'/'.$directory;
    if (! is_dir($path) && ! mkdir($path, 0700, true) && ! is_dir($path)) {
        throw new RuntimeException('Cannot create Laravel temporary storage.');
    }
}
$_ENV['LARAVEL_STORAGE_PATH'] = $_SERVER['LARAVEL_STORAGE_PATH'] = $storage;
putenv('LARAVEL_STORAGE_PATH='.$storage);

require __DIR__.'/../public/index.php';
