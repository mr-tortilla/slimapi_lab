<?php

namespace Config;

use mysqli;

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'slimapi_lab';
    private $port = 3306;

    /** @var mysqli */
    private $connection;

    public function __construct($dbname = '')
    {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $dbname ?: $this->dbname, $this->port);
    }

    public function query(string $query, array $params = [])
    {
        $stmt = $this->connection->prepare($query);
        if ($params) {
            $flags = '';
            foreach ($params as $param) {
                $flags .= substr(gettype($param), 0, 1);
            }
            $stmt->bind_param($flags, $params);
        }
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}