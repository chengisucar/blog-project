<?php

namespace App\Foundation;

class Request
{
    public function __construct(private array $get, private array $post)
    {
        
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