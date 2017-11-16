<?php

namespace UAI\Controller;

use UAI\DAO\Dao;

const DS = DIRECTORY_SEPARATOR;

class Controller extends Router
{
    private $runController;
    protected $message;
    protected $title;
    protected $keywords;
    protected $layout = '_layoutMain';
    protected $dao;
        
    public function __construct()
    {
        parent::__construct();
        $this->dao = new Dao();
    }

    public function run()
    {
        $this->runController = 'Controller' .DS. $this->getController() . 'Controller';
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
        $this->RenderLayout();
    }

    public function Render()
    {
        if (is_array($this->fileView) && count($this->fileView) > 0) {
            foreach ($this->fileView as $key => $value) {
                include ($value);
            }
        } else {
            if (!is_null($this->fileView) && $this->fileExist($this->fileView)) {
                include ($this->fileView);
            }
        }
    }

    private function RenderLayout()
    {
        if (!is_null($this->layout)) {
            $layout = "view".DS.$this->layout.".phtml";

            if (file_exists($layout)) {
                include ($layout);
            } else {
                die('Não foi possivél localizar o layout');
            }
        }
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
                $path = 'view' .DS. $this->getArea() . DS. $this->getController() . DS. $value . '.phtml';
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

    // metodos do Dao

    public function readByAtributes($atributes) {
         // fazer paginacao aqui
        return $this->dao->readByAtributes($atributes);
    }

    public function readAll()
    {
        if (isset($this->dao)) {            
            return self::readByAtributes([]);
        }
    }
}