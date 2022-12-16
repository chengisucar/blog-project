<?php

namespace App\Foundation;

use Exception;

class ViewRenderer
{
    public function __construct(private string $path)
    {
        
    }

    public function render(string $templateName, array $attributes): string
    {
        ob_start();

        include $this->path . $templateName . '.php';

        $renderedContent = ob_get_clean();

        return $renderedContent;
    }
}