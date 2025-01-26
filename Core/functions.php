<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($attributes = [], $code = 404) {
    http_response_code($code);
    extract($attributes);
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path) {
    header("location: {$path}");
    exit();
}

function base_url($path = '') {
    $basePath = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
    return rtrim($basePath, '/') . '/' . ltrim($path, '/');
}

function base_assets_url($path = '') {
    $basePath = dirname(dirname(dirname($_SERVER['SCRIPT_NAME'])));
    return rtrim($basePath, '/') . '/' . ltrim($path, '/');
}

function base_path_display() {
    return str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
}

function owns($id) {
    return $_SESSION['instructor']['id'] == $id;
}

// function old($key, $default = '')
// {
//     return Core\Session::get('old')[$key] ?? $default;
// }