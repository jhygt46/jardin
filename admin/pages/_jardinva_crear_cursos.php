<?php
// TODOS LOS ARCHIVOS EN PAGES//
session_start();
if(!isset($_SESSION['user']['info']['id_user'])){
    exit;
}
require '/var/www/html/virtual/jardinvalleencantado.cl/www/admin/class/mysql_class.php';
$admin = new Conexion();

/* CONFIG PAGE */
$parent_id = 0;
if(isset($_GET["parent_id"])){
    $parent_id = $_GET["parent_id"];
}

$db_var_name = "_jardinva";
$list_ = $admin->sql("SELECT * FROM ".$db_var_name."_cursos WHERE eliminado='0' ORDER BY orders");
$list = $list_['resultado'];

$titulo = "Cursos";
$titulo_list = "Lista de Cursos";
$sub_titulo1 = "Ingresar Cursos";
$sub_titulo2 = "Modificar Cursos";
$accion = "_jardinva_crearcurso";

$eliminaraccion = "_jardinva_eliminarcurso";
$id_list = "id_cur";
$eliminarobjeto = "Curso";
$page_mod = "pages/_jardinva_crear_cursos.php";
/* CONFIG PAGE */

$id = 0;
$sub_titulo = $sub_titulo1;
if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] != 0){
    
    $sub_titulo = $sub_titulo2;
    $that = $admin->sql("SELECT * FROM ".$db_var_name."_cursos WHERE id_cur='".$_GET["id"]."' AND eliminado='0'");
    $id = $_GET["id"];
    
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
                        <input id="nombre" type="text" value="<?php echo $that['resultado'][0]['nombre']; ?>" require="" placeholder="Electro" />
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
                    $prods = $list[$i]['prods'];
                ?>
                
                <li class="user" rel="<?php echo $id; ?>">
                    <ul class="clearfix">
                        <li class="nombre"><?php echo $nombre; ?></li>
                        <a title="Eliminar" class="icn borrar" onclick="eliminar('<?php echo $eliminaraccion; ?>', <?php echo $id; ?>, '<?php echo $eliminarobjeto; ?>', '<?php echo $nombre; ?>')"></a>
                        <a title="Modificar" class="icn modificar" onclick="navlink('<?php echo $page_mod; ?>?id=<?php echo $id; ?>')"></a>
                        <a title="Asistencia" class="icn prods" onclick="openwn('pages/_jardinva_resumen.php?tipo=3&curso=<?php echo $id; ?>', 1320, 650)"></a>
                    </ul>
                </li>
                
                <?php } ?>
                
            </ul>
            
        </div>
    </div>
</div>
<br />
<br />