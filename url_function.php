<?php

function url(){
    $url = explode("/", $_SERVER["REQUEST_URI"]);
    for($i=0; $i<count($url); $i++){
        if(($_SERVER["HTTP_HOST"] == "localhost" && $i != 1 && $url[$i] != "") || ($_SERVER["HTTP_HOST"] != "localhost" && $url[$i] != "")){
            $aux['url'][] = $url[$i];
        }
    }
    if($_SERVER["HTTP_HOST"] == "localhost"){
        $aux['dir_base'] = $_SERVER["DOCUMENT_ROOT"]."/";
        $aux['dir'] = $aux['dir_base'].$url[1]."/";
        $aux['path'] = "/".$url[1]."/";
    }else{
        $a = explode("/", $_SERVER["DOCUMENT_ROOT"]);
        array_pop($a);
        $aux['dir_base'] = implode("/", $a)."/";
        $aux['dir'] = $_SERVER["DOCUMENT_ROOT"]."/";
        $aux['path'] = "/";
    }
    return $aux;
}

?>