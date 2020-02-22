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

$dia = (isset($_GET['dia'])) ? $_GET['dia'] : date("d") ;
$mes = (isset($_GET['mes'])) ? $_GET['mes'] : intval(date("m")) ;
$ano = (isset($_GET['ano'])) ? $_GET['ano'] : date("Y") ;

require_once DIR."admin/class/jardin_class.php";
$jardin = new Jardin();
$info = $jardin->boletas($ano, $mes);

$list = $info['lista'];
$max_boleta = $info['max_boleta'];
$max_factura = $info['max_factura'];

$titulo = "Boletas";
$titulo_list = "Listado de Boletas y Facturas";
$sub_titulo1 = "Ingresar";
$sub_titulo2 = "Modificar";
$accion = "_jardinva_crearboleta";

$eliminaraccion = "_jardinva_eliminarboleta";
$id_list = "id_bol";
$eliminarobjeto = "Boleta/Factura";
$page_mod = "pages/_jardinva_crear_boletas.php";


/* CONFIG PAGE */
$id = 0;
$sub_titulo = $sub_titulo1;
$m_factura = "none";
$cant_dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] != 0){
    
    $id = $_GET["id"];
    $sub_titulo = $sub_titulo2;
    $that = $jardin->boleta($id);
    
    $ano = $that['ano'];
    $mes = $that['mes'];
    $dia = $that['dia'];
    $tipo = $that['tipo'];
    $nula = $that['nula'];
    $valor = $that['matricula'] + $that['mjardin'] + $that['msalacuna'];

}


?>

<script>
    <?php if($id == 0){ ?>
    $("#mes").change(function (){
        var ano = $("#ano option:selected").val();
        var mes = $("#mes option:selected").val();
        navlink('pages/_jardinva_crear_boletas.php?ano='+ano+'&mes='+mes);
    });
    $("#ano").change(function (){
        var ano = $("#ano option:selected").val();
        var mes = $("#mes option:selected").val();
        navlink('pages/_jardinva_crear_boletas.php?ano='+ano+'&mes='+mes);
    });
    <?php } ?>
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
        <div class="options">
            <ul class="ops clearfix">
                <li class="op">
                    <ul class="ss clearfix">
                        <li></li>
                        <li class="ic3" onclick="openwn('pages/_jardinva_resumen.php?tipo=1', 1320, 450)" title="Pagos"></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="name"><?php echo $sub_titulo; ?></div>
        <div class="message"></div>
        <div class="sucont">

            <form action="" method="post" class="basic-grey">
                <fieldset>
                    <input id="id" type="hidden" value="<?php echo $id; ?>" />
                    <input id="accion" type="hidden" value="<?php echo $accion; ?>" />
                    <label>
                        <span>A&ntilde;o:</span>
                        <select id="ano">
                            <?php $desde = date("Y") - 7; for($i=$desde; $i<=date("Y")+1; $i++){ ?>
                            <option value="<?php echo $i; ?>" <?php if($i == $ano){ echo "selected"; } ?>><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Mes:</span>
                        <select id="mes">
                            <option value="1" <?php if($mes == 1){ echo "selected"; } ?>>Enero</option>
                            <option value="2" <?php if($mes == 2){ echo "selected"; } ?>>Febrero</option>
                            <option value="3" <?php if($mes == 3){ echo "selected"; } ?>>Marzo</option>
                            <option value="4" <?php if($mes == 4){ echo "selected"; } ?>>Abril</option>
                            <option value="5" <?php if($mes == 5){ echo "selected"; } ?>>Mayo</option>
                            <option value="6" <?php if($mes == 6){ echo "selected"; } ?>>Junio</option>
                            <option value="7" <?php if($mes == 7){ echo "selected"; } ?>>Julio</option>
                            <option value="8" <?php if($mes == 8){ echo "selected"; } ?>>Agosto</option>
                            <option value="9" <?php if($mes == 9){ echo "selected"; } ?>>Septiembre</option>
                            <option value="10" <?php if($mes == 10){ echo "selected"; } ?>>Octubre</option>
                            <option value="11" <?php if($mes == 11){ echo "selected"; } ?>>Noviembre</option>
                            <option value="12" <?php if($mes == 12){ echo "selected"; } ?>>Diciembre</option>
                        </select>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Dia:</span>
                        <select id="dia">
                            <?php for($i=1; $i<=$cant_dias; $i++){ ?>
                            <option value="<?php echo $i; ?>" <?php if($dia == $i){ echo"selected"; } ?>><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        <div class="mensaje"></div>
                    </label>
                    <label class="nboleta">
                        <span>Numero Boleta:</span>
                        <input id="nboleta" type="text" value="<?php echo $$that['numero']; ?>" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Valor:</span>
                        <input id="matricula" type="text" value="<?php echo $valor; ?>" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Nula:</span>
                        <input id="nula" type="checkbox" value="1" <?php if($that['nula'] == 1){ echo "checked='checked'";} ?> />
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
<style>
    .sub_title{
        font-size: 26px;
        height: 40px;
    }
    .subb_title{
        font-size: 18px;
        height: 25px;
    }
    .tablalist{
        width: 470px;
    }
    .column1{
        width: 50px;
    }
    .column2{
        width: 100px;
    }
    .column3{
        width: 220px;
    }
    .t2{
        width: 340px;
    }
    .t2 .td01{
        width: 120px;
    }
    .t2 .td02{
        width: 220px;
    }
</style>

<?php

function mayormenor($array){
                    
    $mayor = 0;
    $menor = 10000000000;
    for($i=0; $i<count($array); $i++){

        if($array[$i] < $menor){
            $menor = $array[$i];
        }
        if($array[$i] > $mayor){
            $mayor = $array[$i];
        }

    }
    $auxs[0] = $menor;
    $auxs[1] = $mayor;
    return $auxs;

}

?>



<?php if(count($list) > 0){  ?>
<div class="info">
    <div class="fc" id="info-0">
        <div class="minimizar m1"></div>
        <div class="close"></div>
        <div class="name">Resumen de Boletas</div>
        <div class="message"></div>
        <div class="sucont">
            
            <ul class="listUser">
                <table cellspacing="0" cellpadding="0" border="0" class="tablalist">
                    <tr class="sub_title">
                        <td class="column1">Dia</td>
                        <td class="column2">de</td>
                        <td class="column2">al</td>
                        <td class="column3">Total</td>
                    </tr>
                <?php
                $aux = Array();
                for($i=0; $i<count($list); $i++){
                    
                    $dia_ = $list[$i]['dia'];
                    $mes_ = $list[$i]['mes'];
                    $ano_ = $list[$i]['ano'];
                    
                    $fecha_time = mktime(0, 0, 0, $mes_, $dia_, $ano_);
                    
                    if($list[$i]['tipo'] == 1){
                        $aux[$fecha_time]['nbol'][] = $list[$i]['numero'];
                    }
                    if($list[$i]['tipo'] == 2){
                        $aux[$fecha_time]['nfac'][] = $list[$i]['numero'];
                    }
                    if($list[$i]['nula'] == 0){
                        $aux[$fecha_time]['total'] = $aux[$fecha_time]['total'] + $list[$i]['matricula'] + $list[$i]['msalacuna'] + $list[$i]['mjardin'];
                    }
                }
                $tot = 0;
                
                foreach($aux as $key => $value){
                    
                    $tot = $tot + $value['total'];
                    $vals = mayormenor($value['nbol']);
                    echo "<tr class='subb_title'><td>".date("d", $key)."</td><td>".$vals[0]."</td><td>".$vals[1]."</td><td>$ ".number_format($value['total'], 0, ",", ".")."</td></tr>";
                    
                }
                
                ?>
                </table>
                <br>
                
                <table cellspacing="0" cellpadding="0" border="0" class="t2">
                    <tr>
                        <td class="td01">Cantidad de Boletas</td>
                        <td class="td02"><strong><?php echo count($list); ?></strong></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><strong>$ <?php echo number_format($tot, 0, ",", "."); ?></strong></td>
                    </tr>
                </table>
            </ul>
            
        </div>
    </div>
</div>












<div class="info">
    <div class="fc" id="info-0">
        <div class="minimizar m1"></div>
        <div class="close"></div>
        <div class="name">Listado Boletas</div>
        <div class="message"></div>
        <div class="sucont">
            
            <ul class='listUser'>
                
                <?php
                
                for($i=0; $i<count($list); $i++){
                    $id = $list[$i][$id_list];
                    $tipo = $list[$i]['tipo'];
                    $nombre = $list[$i]['numero'];
                    $mes = $list[$i]['mes'];
                    $ano = $list[$i]['ano'];
                    if($tipo == 1){
                ?>
                
                <li class="user" rel="<?php echo $id; ?>">
                    <ul class="clearfix">
                        <li class="nombre"><strong><?php echo $nombre; ?></strong></li>
                        <a title="Eliminar" class="icn borrar" onclick="eliminar('<?php echo $eliminaraccion; ?>', <?php echo $id; ?>, '<?php echo $eliminarobjeto; ?>', '<?php echo $nombre; ?>##<?php echo $ano; ?>##<?php echo $mes; ?>##<?php echo $dia; ?>')"></a>
                        <a title="Modificar" class="icn modificar" onclick="navlink('<?php echo $page_mod; ?>?id=<?php echo $id; ?>&mes=<?php echo $mes; ?>&ano=<?php echo $ano; ?>')"></a>
                    </ul>
                </li>
                
                <?php }} ?>
                
            </ul>
            
        </div>
    </div>
</div>

<?php } ?>
<br />
<br />