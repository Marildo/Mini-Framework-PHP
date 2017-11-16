<?php

namespace Controller;

use UAI\Controller\Controller;
use dao\HomeDao;

class HomeController extends Controller{
    public function __construct() {
        parent::__construct();
        $this->dao = new HomeDao();

        $this->title = 'Categorias';
    }
}