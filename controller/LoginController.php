<?php

namespace Controller;

use dao\UserDao;
use UAI\Controller\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->dao = new UserDao();
        $this->title = 'Login';
    }

    public function signin()
    {
        $user = $this->readByAtributes($this->getPost());
        if (!empty($user)) {
            $this->authentication->save($this->sessionName, (array) $user[0]);  
            $rd = ($this->authentication->read("url")==null)? // para não dizer que não usei ternario
            'Location:'. $this->getLinkHome():
            'Location:../../../'.$this->authentication->read("url");
            header($rd); 
        } else {
            $this->index("Falha no login");
        }
    }
}
