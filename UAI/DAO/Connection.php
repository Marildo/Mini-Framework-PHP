<?php

namespace UAI\DAO;

use \PDO;

class Connection {

    private $IniData;

    public function __construct() {        
        $fileConfig = dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR. 'config'.DIRECTORY_SEPARATOR.'database.ini';       
        $this->IniData = parse_ini_file( $fileConfig );
        //var_dump($this->IniData);                
    }

    public function connection() {
        $pdo = new PDO($this->IniData['driver'] . ':host=' . $this->IniData['host'] . ';dbname=' . $this->IniData['database'], $this->IniData['username'], $this->IniData['password'],
                 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}
