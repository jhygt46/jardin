<?php

$dir = ".";
$directorio = opendir($dir);
$datos=array();

while ($archivo = readdir($directorio)) { 
    if($archivo != '.' && $archivo != '..'){
        $datos[] = $archivo; 
    } 
}

closedir($directorio);

print_r($datos);