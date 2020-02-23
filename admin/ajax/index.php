<?php
session_start();

header('Content-type: text/json');
header('Content-type: application/json');

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."jardin/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."jardin/");
}

require_once DIR."admin/class/guardar_class.php";
$guardar = new Guardar();
$data = $guardar->process();
echo json_encode($data);


?>