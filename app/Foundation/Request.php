<?php

namespace App\Foundation;

class Request
{
    public function __construct(
        private array $get, 
        private array $post, 
        private string $method,
        private string $uri,
    ) {

    }

    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        $path = parse_url($this->uri, PHP_URL_PATH);

        return empty($path) ? '/' : $path;
    }

    public function get(string $name): mixed
    {
        return isset($this->get[$name]) ? $this->get[$name] : null;
    }

    public function post(string $name): mixed
    {
        return isset($this->post[$name]) ? $this->post[$name] : null;
    }
}