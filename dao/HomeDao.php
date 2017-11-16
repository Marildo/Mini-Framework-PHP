<?php

namespace dao;

use UAI\DAO\Dao;

class HomeDao extends Dao {

    public function __construct() {
        parent::__construct();
        $this->entity->tableName = 'categorias';
    }
}
