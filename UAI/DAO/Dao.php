<?php

namespace UAI\DAO;

use \PDOException;
use UAI\DAO\Connection;
use UAI\DAO\Libs\Entity;
use UAI\DAO\Libs\Atributes;

class Dao
{

    private $conn;
    private $instanceConn;
    protected $entity;
    private $atributes;

    private $tableName;
    private $tableKey;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->entity = new Entity();
        $this->atributes = new Atributes();
        
        $this->entity->tableName ='livros' ;
    }

    public function readByKey($key)
    {
        $this->init();
        $query = "SELECT * FROM $this->tableName WHERE $this->dbKey = '$key'";
        $pdo = $this->instanceConn->prepare($query);
        
        try {
            $pdo->execute();
            return $pdo->fetch();
        } catch (PDOException $e){
            dump($e->getMessage());
        }
    }

    private function init()
    {
        $this->instanceConn = $this->conn->connection();
        $this->tableName = $this->entity->tableName;
        $this->dbKey = $this->entity->key;
    }
}
