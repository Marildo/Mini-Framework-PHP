<?php

namespace UAI\DAO;

use \PDOException;
use UAI\DAO\Connection;

class Dao{

    private $conn;
    private $instanceConn;

    public function __construct(){
      $this->conn = new Connection();
      $this->instanceConn = $this->conn->connection();

      $query = "SELECT * FROM livros";
      $pdo = $this->instanceConn->prepare($query);
      
              try {
                  $pdo->execute();
                  var_dump($pdo->fetch());
              } catch (PDOException $e) {
                var_dump($e->getMessage());
              }
    }


}
