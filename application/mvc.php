<?php
//Includes
require 'view/load.php';
require 'model/model.php';
require 'controller/controller.php';
//Initialise by creating a new controller instance
$pageURI = $_SERVER['REQUEST_URI'];
$pageURI = substr($pageURI, strrpos($pageURI,'index.php')+10);
if(!$pageURI){
	new Controller('home');
} else {
	new Controller($pageURI);
}

?>