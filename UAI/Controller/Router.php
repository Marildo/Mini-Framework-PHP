<?php

namespace UAI\Controller;

class Router{

    private $url;
    private $urlParts;
    private $area;
    private $action;
    private $params;
  
    public function __construct(){           
        $this->setUrl();
        $this->setUrlParts();
        $this->setArea();    
        $this->setController();
        $this->setAction();
        $this->setParams();
    }

    private function setUrl() {
        $this->url = strip_tags(trim(filter_input(INPUT_GET, 'pg', FILTER_DEFAULT)));             
    }

    private function setUrlParts() {
        $this->urlParts = explode('/', $this->url);        
    }

    private function setArea() {
        $area = strtoupper($this->urlParts[0]);
        if (empty($area) || ($area != 'ADMIN' && $area != 'SITE')) {
            array_unshift($this->urlParts, 'site');
        }
        $this->area = $this->urlParts[0];
    }

    public function getArea() {
        return $this->area;
    }

    private function setController() {
        if (empty($this->urlParts[1])) {
            $this->urlParts[1] = 'home';
        }
        $this->controler = $this->urlParts[1];
    }

    public function getController() {
        return $this->controler;
    }

    private function setAction() {
        if (empty($this->urlParts[2])) {
            $this->urlParts[2] = 'index';
        }
        $this->action = $this->urlParts[2];
    }

    public function getAction() {
        return $this->action;
    }

    private function setParams() {
        $this->params = array_slice($this->urlParts, 3, count($this->urlParts));
    }

    public function getParams() {
        return $this->params;
    }

}