<?php

namespace Core;

use PDO;
use PDOException;

class Database {
    public $connection;
    public $statement;

    public function __construct($config) {
        $username = $config['username'];
        $password = $config['password'];
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function testConnection() {
        try {
            $this->connection->getAttribute(PDO::ATTR_CONNECTION_STATUS);
            return "Database connection is working.";
        } catch (PDOException $e) {
            return "Database connection failed: " . $e->getMessage();
        }
    }

    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function update($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        return $this->statement->execute($params);
    }

    public function get() {
        return $this->statement->fetchAll();
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findOrFail() {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
