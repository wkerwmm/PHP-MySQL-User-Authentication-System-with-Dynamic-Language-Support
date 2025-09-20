<?php
class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $pattern, $handler, array $middleware = []): void
    {
        $this->add('GET', $pattern, $handler, $middleware);
    }

    public function post(string $pattern, $handler, array $middleware = []): void
    {
        $this->add('POST', $pattern, $handler, $middleware);
    }

    private function add(string $method, string $pattern, $handler, array $middleware): void
    {
        $this->routes[$method][] = [
            'regex' => $this->compilePattern($pattern),
            'params' => $this->extractParamNames($pattern),
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    private function compilePattern(string $pattern): string
    {
        $escaped = preg_replace('#\/#', '\/', rtrim($pattern, '/') ?: '/');
        $regex = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '([^\/]+)', $escaped);
        return '#^' . $regex . '$#';
    }

    private function extractParamNames(string $pattern): array
    {
        preg_match_all('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', $pattern, $m);
        return $m[1] ?? [];
    }

    private function findMatch(string $method, string $path): ?array
    {
        $routes = $this->routes[$method] ?? [];
        foreach ($routes as $route) {
            if (preg_match($route['regex'], $path, $matches)) {
                array_shift($matches);
                $params = [];
                if (!empty($route['params'])) {
                    $params = array_combine($route['params'], $matches);
                }
                return [
                    'handler' => $route['handler'],
                    'middleware' => $route['middleware'],
                    'params' => $params,
                ];
            }
        }
        return null;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $path = rtrim($path, '/') ?: '/';
        $match = $this->findMatch($method, $path);
        if (!$match) {
            http_response_code(404);
            echo 'Not Found';
            return;
        }
        foreach ($match['middleware'] as $mw) {
            $ok = true;
            if (is_callable($mw)) {
                $ok = (bool)($mw)($match['params']);
            }
            if ($ok === false) {
                return;
            }
        }
        $handler = $match['handler'];
        $params = $match['params'];
        if (is_array($handler) && count($handler) === 2) {
            $result = call_user_func($handler, $params);
        } elseif (is_callable($handler)) {
            $result = $handler($params);
        } else {
            $result = null;
        }
        if (is_string($result)) {
            echo $result;
        }
    }
}

