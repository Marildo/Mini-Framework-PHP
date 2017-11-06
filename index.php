<?php
include("config".DIRECTORY_SEPARATOR."config.php");

use Controller\HomeController;

$ctrl = New HomeController();

$ctrl->teste();

$ctrl->run();



echo "<h1> Uai </h1>";
