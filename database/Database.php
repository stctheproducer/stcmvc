<?php

namespace Database;

use \PDO as PDO;

class Database {
    private $_config;

    private $_connection;

    private static $_instance;

    public static function getInstance(array $config) {
        if (!self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    public function __construct(array $config) {
        $this->_config = $config;
        $this->initialisePDOConnection();
    }

    public function __destruct() {
        $this->_connection = NULL;
    }

    private function initialisePDOConnection() {
        if ($this->_connection === NULL):
            $dsn = "" .
                $this->_config['driver'] .
                ":host=" . $this->_config['host'] .
                ";port=" . $this->_config['port'] .
                ";dbname=" . $this->_config['dbname'];
        endif;

        try {
            $this->_connection = new PDO ($dsn, $this->_config['username'], $this->_config['password']);
            $this->_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $e) {
            echo __LINE__.$e->getMessage();
        }
        
    }

    private function __clone() {}
    
    public function getConnection() {
        return $this->_connection;
    }

    // Get a single record from the database
    public function getSingleRecord($sql, $params = NULL) {
        if ($params != NULL):
            $stmt = $this->_connection->prepare($sql);
            $stmt->execute($params);
        else:
            $stmt = $this->_connection->query($sql);
        endif;
        if (!$stmt->rowCount()):
            return "No Record Found!";
        else:
            return $stmt->fetch();
        endif;
    }

    // Get all records from the database
    public function getAllRecords($sql, $params = NULL) {
        if ($params != NULL):
            $stmt = $this->_connection->prepare($sql);
            $stmt->execute($params);
        else:
            $stmt = $this->_connection->query($sql);
        endif;
        if (!$stmt->rowCount()):
            return "No Records Found!";
        else:
            return $stmt->fetchAll();
        endif;
    }
    
    // Insert records into the database
    public function insertRecord($sql, $params) {
        $stmt = $this->_connection->$prepare($sql);
        $stmt->execute($params);
        return "Record Added!";
    }

    // Update records in the database
    public function updateRecord($sql, $params) {
        $stmt = $this->_connection->$prepare($sql);
        $stmt->execute($params);
        return "Record Updated!";
    }

    // Delete records from the database
    public function deleteRecord($sql, $params) {
        $stmt = $this->_connection->$prepare($sql);
        $stmt->execute($params);
        return "Record Deleted!";
    }
}