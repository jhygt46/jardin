<?php

header('Content-type: text/json');
header('Content-type: application/json');

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."jardin/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."jardin/");
}

require_once DIR."admin/class/libro_class.php";
$libro = new Libro();

if($_POST["accion"] == "nuevo_libro"){
	echo json_encode($libro->nuevo_libro());
}
if($_POST["accion"] == "prestar_libro"){
	echo json_encode($libro->prestar_libro());
}
if($_POST["accion"] == "devolver_libro"){
	echo json_encode($libro->devolver_libro());
}
if($_POST["accion"] == "sin_bolsa"){
	echo json_encode($libro->sin_bolsa());
}



?>