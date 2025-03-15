<?php
require __DIR__ . '/../system/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Determine the requested route.
 *
 * @var string $route Current route (default: "home").
 */
$route = $_GET['route'] ?? 'home';

/**
 * Route the request to the appropriate view.
 */
switch ($route) {
    case 'login':
        require __DIR__ . '/../app/views/login.php';
        break;
    case 'register':
        require __DIR__ . '/../app/views/register.php';
        break;
    case 'logout':
        session_destroy();
        header("Location: /");
        break;
    case 'dashboard':
        require __DIR__ . '/../app/views/dashboard.php';
        break;
    default:
        require __DIR__ . '/../app/views/home.php';
}
?>
