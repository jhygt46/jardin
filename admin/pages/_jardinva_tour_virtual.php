<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_SESSION['user']['info']['id_user'])){
    exit;
}
require '/var/www/html/virtual/jardinvalleencantado.cl/www/admin/class/mysql_class.php';
$admin = new Conexion();

/* CONFIG PAGE */
$db_var_name = "_jardinva";
$list_ = $admin->sql("SELECT * FROM ".$db_var_name."_tour");
$list = $list_['resultado'];

$titulo = "Tour Virtual";
$titulo_list = "Lugares";
$accion = "_jardinva_crearfoto";

$id_list = "id_tour";
$page_pic = "pages/asignar_imagen.php?db=tour";
/* CONFIG PAGE */

$id = 0;
$sub_titulo = $sub_titulo1;
if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] != 0){
    
    $sub_titulo = $sub_titulo2;
    $that = $admin->sql("SELECT * FROM ".$db_var_name."_tour WHERE id_tour='".$_GET["id"]."'");
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
<?php if($id > 0){ ?>
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
<?php } ?>
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
                        <a title="Fotos" class="icn fotos" onclick="navlink('<?php echo $page_pic; ?>&id=<?php echo $id; ?>')"></a>
                    </ul>
                </li>
                
                <?php } ?>
                
            </ul>
            
        </div>
    </div>
</div>
<br />
<br />