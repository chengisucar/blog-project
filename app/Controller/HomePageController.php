<?php

namespace App\Controller;

use App\dbconnect\DbConnect;
use App\Foundation\Request;
use App\Foundation\ViewRenderer;
use PDO;

class HomePageController
{
    private PDO $database;
    public function __construct(private ViewRenderer $viewRenderer)
    {
        $this->database = (new DbConnect())->createConnection();
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
