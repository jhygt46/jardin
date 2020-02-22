<?php

session_start();
if(!isset($_SESSION['user']['info']['id_user'])){
    exit;
}

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."jardin/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."jardin/");
}

$id_alu = (isset($_GET["id_alu"])) ? $_GET["id_alu"] : 0 ;

require_once DIR."admin/class/jardin_class.php";
$jardin = new Jardin();
$list_ = $jardin->prestamos($id_alu);

$eliminaraccion = "_jardinva_eliminarprestamo";
$eliminarobjeto = "Prestamo";


?>

<div class="info">
    <div class="fc" id="info-0">
        <div class="minimizar m1"></div>
        <div class="close"></div>
	<div class="options">
            <ul class="ops clearfix">
                <li class="op">
                    <ul class="ss clearfix">
                        <li><input class="inptxt" type="text"></li>
                        <li class="ic1" onclick="opcs(this, 'name')" title="Nombre"></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="name">Prestamos</div>
        <div class="message"></div>
        <div class="sucont">
            
            <ul class='listUser'>
                
                <?php
                
                for($i=0; $i<count($list); $i++){
                    $id = $list[$i]['id_pre'];
                    $nombre = $list[$i]['nombres']." ".$list[$i]['apellido_p']." ".$list[$i]['apellido_m'];
		            $dias = intval((time() - strtotime($list[$i]['fecha_presto']))/86400);
		            $libro = $list[$i]['nombre'];
                ?>
                
                <li class="user">
                    <ul class="clearfix">
                        <li class="nombre" name="<?php echo $nombre; ?> <?php echo $libro; ?>"><a style="cursor: pointer" onclick="navlink('pages/_jardinva_prestamos.php?id_alu=<?php echo $id; ?>')"><?php echo $nombre; ?></a> <strong>(<?php echo $dias; ?> dias)</strong> - <?php echo $libro; ?></li>
                        <a title="Eliminar" class="icn borrar" onclick="eliminar('<?php echo $eliminaraccion; ?>', <?php echo $id; ?>, '<?php echo $eliminarobjeto; ?>', '<?php echo $nombre; ?>')"></a>
                    </ul>
                </li>
                
                <?php } ?>
                
            </ul>
            
        </div>
    </div>
</div>
<br />
<br />
