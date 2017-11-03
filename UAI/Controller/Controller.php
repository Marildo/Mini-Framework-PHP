<?php 

namespace UAI\Controller;

class Controller extends Router{

    public function __construct(){                    
        parent::__construct();
    }

    public function teste(){                
        echo "Area: {$this->getArea()}<br>
        Controller: {$this->getController()}<br>
        Action: {$this->getAction()}<br>
        Parans: {$this->getParams()}";
    }
}