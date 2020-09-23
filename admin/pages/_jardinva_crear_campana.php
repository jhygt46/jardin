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

require_once DIR."admin/class/jardin_class.php";
$jardin = new Jardin();

$titulo = "Campa&ntilde;as";
$titulo_list = "Lista de Campa&ntilde;as";
$sub_titulo1 = "Ingresar Campa&ntilde;a";
$sub_titulo2 = "Modificar Campa&ntilde;a";
$accion = "_jardinva_crearcampana";

$eliminaraccion = "eliminarcampana";
$id_list = "id_cam";
$eliminarobjeto = "CampaCampa&ntilde;a";
$page_mod = "pages/_jardinva_crear_campana.php";

$id = 0;
$sub_titulo = $sub_titulo1;


if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] != 0){
    
	$id = $_GET["id"];
    $sub_titulo = $sub_titulo2;
    $that = $jardin->usuario($id);
    	
}

//$list = $jardin->get_materiales($categoria);

?>

<script>
    $("#categoria").change(function (){
        var categoria = $("#categoria option:selected").val();
        navlink('pages/_jardinva_crear_material.php?categoria='+categoria);
    });
</script>

<div class="title">
    <h1><?php echo $titulo; ?></h1>
    <ul class="clearfix">
        <li class="back" onclick="backurl()"></li>
    </ul>
</div>
<hr>
<div class="info">
    <div class="fc" id="info-0">
        <div class="minimizar m1"></div>
        <div class="close"></div>
        <div class="name"><?php echo $sub_titulo; ?></div>
        <div class="message"></div>
        <div class="sucont">
            <form action="" method="post" class="basic-grey">
                <fieldset>
                    <input id="id" type="hidden" value="<?php echo $id; ?>" />
                    <input id="accion" type="hidden" value="<?php echo $accion; ?>" />
                    <label>
                        <span>Asunto:</span>
                        <input id="asunto" type="text" value="<?php echo $that['asunto']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Template:</span>
                        <input id="template" type="text" value="<?php echo $that['template']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label style='margin-top:20px'>
                        <span>&nbsp;</span>
                        <a id='button' onclick="form()">Enviar</a>
                    </label>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<div class="info">
    <div class="fc" id="info-0">
        <div class="minimizar m1"></div>
        <div class="close"></div>
        <div class="name"><?php echo $titulo_list; ?></div>
        <div class="message"></div>
        <div class="sucont">
            
            <ul class='listUser'>
                
                <?php
                
                for($i=0; $i<count($list); $i++){
                    $id = $list[$i][$id_list];
                    $nombre = $list[$i]['nombre'];
                ?>
                
                <li class="user">
                    <ul class="clearfix">
                        <li class="nombre"><?php echo $nombre; ?></li>
                        <a title="Eliminar" class="icn borrar" onclick="eliminar('<?php echo $eliminaraccion; ?>', <?php echo $id; ?>, '<?php echo $eliminarobjeto; ?>', '<?php echo $nombre; ?>')"></a>
                        <a title="Modificar" class="icn modificar" onclick="navlink('<?php echo $page_mod; ?>?id=<?php echo $id; ?>&parent_id=<?php echo $parent_id; ?>')"></a>
                    </ul>
                </li>
                
                <?php } ?>
                
            </ul>
            
        </div>
    </div>
</div>
<br />
<br />