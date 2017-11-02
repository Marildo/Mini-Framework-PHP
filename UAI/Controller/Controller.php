<?php 

namespace UAI\Controller;

class Controller extends Router{

    public function __construct(){                    
        parent::__construct();
    }

    public function teste(){
        echo "testando controller";
    }
}