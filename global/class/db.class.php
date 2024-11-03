<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class DataBase
{
    private static $instance = null;
    private $DBH;
    private $STMT;
    private $isConnected = false;

    private function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        if ($this->isConnected) {
            return;
        }

        $options = [
            PDO::ATTR_EMULATE_PREPARES => true,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->DBH = new PDO("mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'), $options);
            $this->isConnected = true;
        } catch (PDOException $e) {
            // Log error
            error_log($e->getMessage());
            throw $e; // Optionally rethrow the exception
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DataBase();
        }
        return self::$instance;
    }

    public function query($query)
    {
        $this->connect();
        $this->STMT = $this->DBH->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->STMT->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->STMT->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->STMT->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->STMT->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->STMT->rowCount();
    }

    public function lastInsertId()
    {
        return $this->DBH->lastInsertId();
    }

    public function startTransaction()
    {
        $this->connect();
        return $this->DBH->beginTransaction();
    }

    public function endTransaction()
    {
        return $this->DBH->commit();
    }

    public function cancelTransaction()
    {
        return $this->DBH->rollBack();
    }

    public function debugDumpParams()
    {
        return $this->STMT->debugDumpParams();
    }

    public function fetchColumn()
    {
        $this->execute();
        return $this->STMT->fetchColumn();
    }

    // Optional destructor to close the connection
    public function __destruct()
    {
        $this->DBH = null;
    }
}

?>
