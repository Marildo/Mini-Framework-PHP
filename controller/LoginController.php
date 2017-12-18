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
            header('Location:../../../'.$this->authentication->read("url")); 
        } else {
            $this->index("Falha no login");
        }
    }
}
