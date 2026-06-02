<?php

namespace App;

use PDO;

class Database
{
    private static $instance = null;

    private $connection;

    private function __construct()
    {
        $databasePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'urls.sqlite';
        $storageDirectory = dirname($databasePath);

        if (!is_dir($storageDirectory)) {
            mkdir($storageDirectory, 0775, true);
        }

        $this->connection = new PDO('sqlite:' . $databasePath);

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $this->createTables();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connection()
    {
        return $this->connection;
    }

    private function createTables()
    {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS urls (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT NOT NULL UNIQUE,
    url TEXT NOT NULL,
    expires_at TEXT NULL,
    created_at TEXT NOT NULL
)
SQL;

        $this->connection->exec($sql);
    }

}