<?php

namespace App\Foundation;

class ViewRenderer
{
    public function __construct(private string $path)
    {
        
    }

    public function render(string $templateName): string
    {
        // use ob_start();
        return '<p>sample-data</p>';
    }
}