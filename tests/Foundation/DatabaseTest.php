<?php

declare(strict_types=1);

namespace Tests\Foundation;

use App\Foundation\Database;
use PHPUnit\Framework\TestCase;

final class DatabaseTest extends TestCase
{
    const DSN = 'mysql:host=db;dbname=php_db';
    const USERNAME = 'php_user';
    const PASSWORD = 'password';

    public function testQuery()
    {
        $database = new Database(self::DSN, self::USERNAME, self::PASSWORD);
        $result = $database->query('select * from users');

        $this->assertInstanceOf(Database::class, $result);
    }

    public function testFetchAll()
    {
        $database = new Database(self::DSN, self::USERNAME, self::PASSWORD);
        $rows = $database->query('select * from users')->fetchAll();

        $this->assertIsArray($rows);
    }
}
