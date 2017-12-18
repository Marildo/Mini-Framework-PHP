<?php

namespace dao;

use UAI\DAO\Dao;

class UserDao extends Dao {

    public function __construct() {
        parent::__construct();
        $this->entity->tableName = 'user';
    }
}
