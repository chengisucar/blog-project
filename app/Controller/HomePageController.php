<?php

namespace App\Controller;

use App\Foundation\Database;
use App\Foundation\Request;
use App\Foundation\ViewRenderer;

class HomePageController
{
    public function __construct(
        private Database $database,
        private ViewRenderer $viewRenderer
    ) {
    }

    public function execute(Request $request): string
    {
        $users = $this
            ->database
            ->query('SELECT id, name, hobbies FROM users ORDER BY created_at')
            ->fetchAll()
        ;

        return $this->viewRenderer->render('homepage', [
            'users' => $users
        ]);
    }
}
