<?php

namespace UAI\Controller;

const DS = DIRECTORY_SEPARATOR;

class Controller extends Router
{

    private $runController;
    protected $message;
    protected $title;
    protected $keywords;

    
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
        $this->message = $message;
        $this->view('index');
    }

    public function view($render = null)
    {
        $this->title = is_null($this->title) ? 'Meu titulo' : $this->title;
        $this->keywords = is_null($this->keywords) ? 'Minha palavra chave' : $this->keywords;

        $this->setFileView($render);
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

    private function setFileView($render = null)
    {
        if (is_array($render)) {
            foreach ($render as $value) {
                $path = 'View' .DS. $this->getArea() . DS. $this->getController() . DS. $value . '.phtml';
                $this->fileExist($path);
                $this->fileView[] = $path;
            }
        } else {
            $pathRender = is_null($render) ? $this->getAction() : $render;
            $this->fileView = 'View' .DS. $this->getArea() . DS . $this->getController() . DS. $pathRender . '.phtml';
            $this->fileExist($this->fileView);
        }
    }
    
    private function fileExist($file)
    {
        $findFile = file_exists($file);
        if (!$findFile) {
            die('Não foi localizado o arquivo ' . $file);
        }
        return $findFile;
    }
}