<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'Core/Router.php';

session_start();

if (!isset($_SESSION['user'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user']['user_email'] = $_COOKIE['user']['user_email'];
        $_SESSION['user']['username'] = $_COOKIE['user']['username'];
        echo "Welcome back, " . $_SESSION['user']['username'] . "!";
    }
}


$router = new \Core\Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
