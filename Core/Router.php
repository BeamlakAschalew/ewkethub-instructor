<?php

namespace Core;

require BASE_PATH . "Core/Middleware/Middleware.php";

use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function showRoutes() {
        dd($this->routes);
    }

    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $route['uri']);

            if (preg_match("#^$pattern$#", $uri, $matches) && $route['method'] === strtoupper($method)) {
                array_shift($matches);
                Middleware::resolve($route['middleware']);

                if (preg_match_all('/\{([^\}]+)\}/', $route['uri'], $paramNames)) {
                    foreach ($paramNames[1] as $index => $name) {
                        if ($method === 'GET') {
                            $_GET[$name] = $matches[$index];
                        } elseif ($method === 'POST') {
                            $_POST[$name] = $matches[$index];
                        }
                    }
                }
                return require base_path('http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    public function previousUrl() {
        return $_SERVER['HTTP_REFERER'];
    }

    protected function abort($code = 404) {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
