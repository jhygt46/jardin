<?php

session_start();
if(!isset($_SESSION['user']['info']['id_user'])){
    exit;
}

require '/var/www/html/virtual/jardinvalleencantado.cl/www/admin/class_qr/qrlib.php';
$dir = "/var/www/html/virtual/jardinvalleencantado.cl/www/admin/images/tempqr/";


if($handler = opendir($dir)) {
    while(false !== ($file = readdir($handler))) {
            if(is_file($dir.$file) && $file != "index.html"){
                unlink($dir.$file);
            }
    }
    closedir($handler);
}

$cantidad = (isset($_GET["cantidad"])) ? $_GET["cantidad"] : 10 ;
$x = (isset($_GET["x"])) ? $_GET["x"] : 'L' ; //('L','M','Q','H')
$size = (isset($_GET["size"])) ? $_GET["size"] : 5 ;

echo "<script> window.print(); </script>";

echo "<div style='display: block'>";
for($i=0; $i<$cantidad; $i++){

    $code = pass_generate(30);
    $file_name = $dir.$code.".png";
    $data = "http://www.jardinvalleencantado.cl/libro/".$code;
    QRcode::png($data, $file_name, $x, $size, 1);
    echo "<img src='/admin/images/tempqr/".$code.".png' alt='' />";

}
echo "</div>";

function pass_generate($n){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    for($i=0; $i<$n; $i++){
        $r .= $chars{rand(0, strlen($chars)-1)};
    }
    return $r;
}


?>