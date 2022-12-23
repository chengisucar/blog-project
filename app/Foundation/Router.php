<?php

namespace App\Foundation;

class Router
{
    private array $routes = [];

    public function get(string $path, callable $callback)
    {
        $route = [
            'method' => 'GET',
            'path' => $path,
            'callback' => $callback,
        ];

        array_push($this->routes, $route);
    }

    public function dispatch(Request $request)
    {
        $method = $request->method();
        $path = $request->path();

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $callback = $route['callback'];
                $callback();
            }
        }
    }
}