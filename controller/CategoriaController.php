<?php

namespace Controller;

use dao\HomeDao;
use UAI\Controller\Controller;

class CategoriaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->dao = new HomeDao();
        $this->title = 'Categorias';
        $this->requireAuthentication = true;
    }
}
