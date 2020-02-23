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


$titulo = "Usuarios";
$titulo_list = "Lista de Usuarios";
$sub_titulo1 = "Ingresar Usuario";
$sub_titulo2 = "Modificar Usuario";
$accion = "crearusuarios";

$eliminaraccion = "eliminarusuarios";
$id_list = "id_user";
$eliminarobjeto = "Usuarios";
$page_mod = "pages/crear_usuario.php";

$id = 0;
$sub_titulo = $sub_titulo1;

$that['perm_devolucion'] = 0;
$that['perm_prestamo'] = 0;
$that['perm_ingreso'] = 0;
$that['perm_edicion'] = 0;

if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] != 0){
    
	$id = $_GET["id"];
    $sub_titulo = $sub_titulo2;
    $that = $jardin->usuario($id);
    	
}


?>
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
                        <span>Nombre:</span>
                        <input id="nombre" type="text" value="<?php echo $that['nombre']; ?>" require="" placeholder="Diego Gomez" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Correo:</span>
                        <input id="correo" type="text" value="<?php echo $that['correo']; ?>" require="" placeholder="diegomez13@hotmail.com" />
                        <div class="mensaje"></div>
                    </label>
		            <label>
                        <span>Password:</span>
                        <input id="pass" type="password" value="" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Ingreso Libros:</span>
                        <input id="perm_ingreso" type="checkbox" value="1" <?php echo ($that['perm_ingreso'] == 1) ? 'checked="checked"' : '' ; ?>>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Editar Libros:</span>
                        <input id="perm_edicion" type="checkbox" value="1" <?php echo ($that['perm_edicion'] == 1) ? 'checked="checked"' : '' ; ?>>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Prestar Libros:</span>
                        <input id="perm_prestamo" type="checkbox" value="1" <?php echo ($that['perm_prestamo'] == 1) ? 'checked="checked"' : '' ; ?>>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Devolver Libro:</span>
                            <select id="perm_devolucion">
                                <option value="1" <?php echo ($that['perm_devolucion'] == 1) ? 'selected' : '' ; ?>>Devolver solo prestados por mi</option>
                                <option value="2" <?php echo ($that['perm_devolucion'] == 2) ? 'selected' : '' ; ?>>Devolver todos</option>
                            </select>
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