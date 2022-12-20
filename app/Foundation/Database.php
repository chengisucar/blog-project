<?php

declare(strict_types = 1);

namespace App\Foundation;

use PDO;
use PDOStatement;

class Database
{
    private PDO $connection;

    private PDOStatement $result;

    public function __construct(
        private readonly string $dsn,
        private readonly string $username,
        private readonly string $password,
    ) {
        $this->connection = new PDO($this->dsn, $this->username, $this->password);
    }

    public function query(string $query): self
    {
        $result = $this->connection->query($query);
        if ($result === false) {
            throw new \Exception('result is not exists');
        }

        $this->result = $result;

        return $this;
    }

    public function fetchAll(): array
    {
        $rows = $this->result->fetchAll(PDO::FETCH_ASSOC);

        if ($rows === false) {
            throw new \Exception('rows not exists');
        }

        return $rows;
    }
}