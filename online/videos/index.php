<?php

$dir = ".";
$directorio = opendir($dir);
$datos = [];

while ($archivo = readdir($directorio)) { 
    if($archivo != '.' && $archivo != '..'){
        $datos[] = $archivo; 
    } 
}

closedir($directorio);

echo json_encode($datos);