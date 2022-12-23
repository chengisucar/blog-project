<?php

declare(strict_types=1);

namespace App\dbconnect;

use PDO;

class DbConnect
{
    public function createConnection(): PDO
    {
        $host = $_ENV['DATABASE_HOST'];
        $dbname = $_ENV['DATABASE_NAME'];
        $username = $_ENV['DATABASE_USER'];
        $password = $_ENV['DATABASE_PASSWORD'];

        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}