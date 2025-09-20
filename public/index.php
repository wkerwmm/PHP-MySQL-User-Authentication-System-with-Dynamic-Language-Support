<?php
require_once __DIR__ . '/../system/bootstrap.php';
require_once __DIR__ . '/../system/Router.php';
require_once __DIR__ . '/../system/View.php';
require_once __DIR__ . '/../system/Csrf.php';

$router = new Router();

$authGuard = function () {
    if (!isset($_SESSION['user'])) {
        redirect('/login');
        return false;
    }
    return true;
};

$router->get('/', function () {
    return View::render('home', ['title' => 'Home']);
});

$router->get('/login', function () {
    return View::render('login', ['title' => 'Login']);
});

$router->post('/auth/login', function () {
    if (!Csrf::validate($_POST['csrf'] ?? null)) {
        http_response_code(400);
        return 'Invalid CSRF token';
    }
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === '' || $password === '') {
        return 'Please fill in all fields!';
    }
    require_once __DIR__ . '/../system/functions.php';
    $result = loginUser($username, $password);
    if ($result === 'success') {
        return 'success';
    }
    return $result;
});

$router->get('/register', function () {
    return View::render('register', ['title' => 'Register']);
});

$router->post('/auth/register', function () {
    if (!Csrf::validate($_POST['csrf'] ?? null)) {
        http_response_code(400);
        return 'Invalid CSRF token';
    }
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === '' || $password === '') {
        return 'Please fill in all fields!';
    }
    require_once __DIR__ . '/../system/functions.php';
    $result = registerUser($username, $password);
    if ($result === 'success') {
        return 'success';
    }
    return $result;
});

$router->get('/dashboard', function () {
    return View::render('dashboard', ['title' => 'Dashboard']);
}, [$authGuard]);

$router->get('/logout', function () {
    session_destroy();
    redirect('/');
});

$router->get('/lang/{code}', function ($params) {
    $code = $params['code'] ?? 'en';
    $_SESSION['language'] = in_array($code, ['en','tr'], true) ? $code : 'en';
    redirect('/');
});

$router->dispatch();
