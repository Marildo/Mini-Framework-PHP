<?php

namespace UAI\DAO\Libs;

class Entity {

    private $tableName;
    private $key;

    function __construct() {        
        $this->key ='id';
        $this->tableName = 'table name';
    }

    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
