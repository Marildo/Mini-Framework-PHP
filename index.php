<?php
include("config".DIRECTORY_SEPARATOR."config.php");

use Controller\HomeController;

$ctrl = New HomeController();

$ctrl->teste();

$ctrl->run();

use UAI\DAO\Dao;

$dao = new Dao();

$dados = $dao->readByKey(1);

var_dump($dados);