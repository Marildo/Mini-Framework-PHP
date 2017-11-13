<?php
include("config".DIRECTORY_SEPARATOR."config.php");

use Controller\HomeController;

$ctrl = New HomeController();

$ctrl->teste();

$ctrl->run();

use UAI\DAO\Dao;

$dao = new Dao();

/*  create e readByKey
$novo = ['nome'=>'As cronicas de fogo','valor'=>'60'];
$idNovo=$dao->create($novo);

$dados = $dao->readByKey($idNovo);
var_dump($dados);

readByAtributes
$att = ['valor'=>'60'];
$dados = $dao->readByAtributes($att);
var_dump($dados);
*/

$up = ['id'=>'3','valor'=>'40','nome'=>'Hobbit'];
$rowsAf = $dao->update($up);
var_dump($rowsAf);