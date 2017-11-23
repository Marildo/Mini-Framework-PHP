<?php

namespace Controller;

use UAI\Controller\Controller;
use dao\HomeDao;

class CategoriaController extends Controller{
    public function __construct() {
        parent::__construct();
        $this->dao = new HomeDao();

        $this->title = 'Categorias';
    }
}