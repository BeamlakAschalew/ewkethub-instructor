<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'Core/Router.php';

session_start();

if (!isset($_SESSION['instructor'])) {
    if (isset($_COOKIE['instructor'])) {
        $userFromCookie = json_decode($_COOKIE['instructor'], true);
        $_SESSION['instructor']['id'] = $userFromCookie['id'];
        $_SESSION['instructor']['fullName'] = $userFromCookie['full_name'];
        $_SESSION['instructor']['email'] = $userFromCookie['email'];
        $_SESSION['instructor']['username'] = $userFromCookie['username'];
        $_SESSION['instructor']['profilePath'] = $userFromCookie['profile_picture_path'];
    }
}


$router = new \Core\Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
