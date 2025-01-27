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
        $uriSegments = explode('/', trim($uri, '/'));

        foreach ($this->routes as $route) {
            $routeSegments = explode('/', trim($route['uri'], '/'));

            if (count($uriSegments) !== count($routeSegments)) {
                continue;
            }

            $params = [];
            $isMatch = true;

            foreach ($routeSegments as $index => $segment) {
                if (strpos($segment, '{') === 0 && strpos($segment, '}') === strlen($segment) - 1) {
                    $paramName = trim($segment, '{}');
                    $params[$paramName] = $uriSegments[$index];
                } else if ($segment !== $uriSegments[$index]) {
                    $isMatch = false;
                    break;
                }
            }

            if ($isMatch && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                if ($method === 'GET') {
                    $_GET = array_merge($_GET, $params);
                } elseif ($method === 'POST') {
                    $_POST = array_merge($_POST, $params);
                }

                return require base_path('http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404) {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
