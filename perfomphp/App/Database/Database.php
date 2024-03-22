<?php

namespace App\Database;

class Database
{
    private static $connection;
    private static $instance;

    private function __construct() {}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        if (!isset(self::$connection)) {
            $host = 'localhost';
            $dbname = 'cliente';
            $username = 'root';
            $password = '';

            try {
                self::$connection = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die('Erro na conexão com o banco de dados: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }

    public function execute($query, $params = [])
    {
        $stmt = $this->getConnection()->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetch($query, $params = [])
    {
        $stmt = $this->execute($query, $params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll($query, $params = [])
    {
        $stmt = $this->execute($query, $params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
