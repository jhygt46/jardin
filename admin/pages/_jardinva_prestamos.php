<?php

session_start();
if(!isset($_SESSION['user']['info']['id_user'])){
    exit;
}

require '/var/www/html/virtual/jardinvalleencantado.cl/www/admin/class/mysql_class.php';
$admin = new Conexion();

if(isset($_GET["alu"])){
	$list_ = $admin->sql("SELECT t1.id_pre, t1.fecha_presto, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3  WHERE t1.id_alu='".$_GET["id_alu"]."' AND t1.fecha_devolvio='0000-00-00 00:00:00' AND t1.id_user_devolvio='0' AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib ORDER BY t1.fecha_presto");
}else{
	$list_ = $admin->sql("SELECT t1.id_pre, t1.fecha_presto, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3  WHERE t1.fecha_devolvio='0000-00-00 00:00:00' AND t1.id_user_devolvio='0' AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib ORDER BY t1.fecha_presto");
}

$eliminaraccion = "_jardinva_eliminarprestamo";
$eliminarobjeto = "Prestamo";
$list = $list_['resultado'];

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
