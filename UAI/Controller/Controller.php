<?php

namespace UAI\Controller;

class Controller extends Router
{

    private $runController;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function teste()
    {
        echo "Area: {$this->getArea()}<br>
        Controller: {$this->getController()}<br>
        Action: {$this->getAction()}<br>";
        var_dump($this->getParams());
    }

    public function run()
    {
        $this->runController = 'Controller\\' . $this->getController() . 'Controller';
        $this->validarController();

        $this->runController = new $this->runController();

        $this->validarAction();
        $act = $this->getAction();        
        $this->runController->$act();
    }

    public function index($message = null)
    {
      echo "Eu sou a index";
    }

    private function validarController()
    {         
        if (!class_exists($this->runController)) {
            echo 'Controler ' . $this->runController . ' não localizado';
        }
    }

    private function validarAction()
    {
        if (!method_exists($this->runController, $this->getAction())) {            
            echo 'Action "' . $this->getAction() . '" não localizada em ' . $this->getController() . 'Controller';            
        };
    }
}