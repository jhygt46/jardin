<?php

    $dir = ".";
    $directorio = opendir($dir);
    $datos = [];
    while ($archivo = readdir($directorio)) { 
        if($archivo != '.' && $archivo != '..' && $archivo != 'index.php'){
            $datos[] = $archivo; 
        } 
    }
    closedir($directorio);
    echo json_encode($datos);

?>