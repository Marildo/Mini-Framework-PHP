<?php
include("config".DIRECTORY_SEPARATOR."config.php");

use Controller\HomeController;

$ctrl = New HomeController();

$ctrl->teste();

$ctrl->run();

use UAI\DAO\Dao;

$dao = new Dao();

$novo = ['nome'=>'As cronicas de fogo','valor'=>'60'];
$idNovo=$dao->create($novo);

$dados = $dao->readByKey($idNovo);

var_dump($dados);