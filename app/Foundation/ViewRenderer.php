<?php

namespace App\Foundation;

use Exception;

class ViewRenderer
{
    public function __construct(private string $path)
    {
        
    }

    public function render(string $templateName, array $attributes = []): string
    {
        ob_start();

        if (count($attributes) !== 0) {
            extract($attributes);
        }

        include $this->path . $templateName . '.php';

        return ob_get_clean();
    }
}