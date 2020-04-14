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
$list = $jardin->usuarios();


$titulo = "Material";
$titulo_list = "Lista de Materiales";
$sub_titulo1 = "Ingresar Material";
$sub_titulo2 = "Modificar Material";
$accion = "_jardinva_crearmaterial";

$eliminaraccion = "eliminarmaterial";
$id_list = "id_mat";
$eliminarobjeto = "Material";
$page_mod = "pages/_jardinva_crear_material.php";

$id = 0;
$sub_titulo = $sub_titulo1;

$categoria = 1;
if(isset($_GET["categoria"]) && is_numeric($_GET["categoria"]) && $_GET["categoria"] != 0){
	$categoria = $_GET["categoria"];
}

if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] != 0){
    
	$id = $_GET["id"];
    $sub_titulo = $sub_titulo2;
    $that = $jardin->usuario($id);
    	
}

$list = $jardin->get_materiales($categoria);

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
                        <span>Categoria:</span>
                            <select id="categoria">
                                <option value="1" <?php echo ($categoria == 1) ? 'selected' : '' ; ?>>Cuentos</option>
                                <option value="2" <?php echo ($categoria == 2) ? 'selected' : '' ; ?>>Cuentos Narrados</option>
                                <option value="3" <?php echo ($categoria == 3) ? 'selected' : '' ; ?>>Canciones</option>
                            </select>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Titulo:</span>
                        <input id="titulo" type="text" value="<?php echo $that['titulo']; ?>" require="" placeholder="Diego Gomez" />
                        <div class="mensaje"></div>
                    </label>
                    <?php if($categoria == 1 || $categoria == 2){ ?>
                    <label class="clearfix">
                        <span><p>Preview: (133x100)</p></span>
                        <input id="file_image0" type="file" />
                    </label>
                    <?php } ?>
                    <?php if($categoria == 3){ ?>
                    <label>
                        <span>Youtube:</span>
                        <input id="youtube" type="text" value="<?php echo $that['youtube']; ?>" require="" placeholder="Diego Gomez" />
                        <div class="mensaje"></div>
                    </label>
                    <?php } ?>
                    <?php if($categoria == 2){ ?>
                    <label class="clearfix">
                        <span><p>Video:</p></span>
                        <input id="file_image1" type="file" />
                    </label>
                    <?php } ?>
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