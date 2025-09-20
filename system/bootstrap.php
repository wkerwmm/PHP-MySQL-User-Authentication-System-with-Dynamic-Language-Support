<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/lang.php';

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/' . $class . '.php',
        __DIR__ . '/' . str_replace('\\', '/', $class) . '.php',
        __DIR__ . '/../app/controllers/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

function redirect($to)
{
    header('Location: ' . $to);
    exit;
}

