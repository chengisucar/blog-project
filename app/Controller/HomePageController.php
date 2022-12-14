<?php

namespace App\Controller;

class HomePageController
{
    public function __construct(private ViewRenderer $viewRenderer)
    {
    }

    public function execute(Request $request): string
    {
        return $this->viewRenderer->renders('homepage', [
            'title' => 'Home Page'
        ]);
    }
}
