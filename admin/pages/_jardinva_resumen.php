<?php
// TODOS LOS ARCHIVOS EN PAGES//
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

$tipo = (isset($_GET["tipo"])) ? $_GET["tipo"] : 0 ;
$id_cur = (isset($_GET["curso"])) ? $_GET["curso"] : 0 ;


require_once DIR."admin/class/jardin_class.php";
$jardin = new Jardin();
$list = $jardin->resumen($tipo, $id_cur);

?>

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" lang="es-CL">
    <head>
        <title>Jardin Valle Encantado - Administrador</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    </head>
    <body>
        <style>
            body{
                margin: 0px;
            }
            .tabla{

            }
            .tabla tr{

            }
            .td1{
                height: 60px;
                font-size: 16px;
            }
            .td1 td{
                text-align: center;
            }
            .td2{
                height: 40px;
                font-size: 14px;
            }
            .td3{
                height: 30px;
                font-size: 12px;
            }
            .color01{
                background: #efefef;
            }
            .color01a{
                background: #e8e8e8;
            }
            .color01b{
                background: #f9f9f9;
            }
            .color01c{
                background: #f4f4f4;
            }
            .color02{
                background: #eaeaea;
            }
            .color02a{
                background: #e4e4e4;
            }
            .color02b{
                background: #f8f8f8;
            }
            .color02c{
                background: #f3f3f3;
            }
            .padd{
                padding-left: 5px;
            }
        </style>

    <?php if($tipo == 1){ ?>
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="2"><img src="../images/hada2.jpg" style="width: 162px"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 18px; padding-top: 5px;">Lista de Pagos</td>
        </tr>
    </table>
    <table cellspacing="0" cellpadding="0" class="tabla" border="1" width="1300px" style="margin-top: 25px">
        <tr class="td2">
            <td width="20">#</td>
            <td style="text-align: left; padding: 2px 4px" width="235">Nombre</td>
            <td width="95" style="padding-left: 4px">Matricula</td>
            <td width="95" style="padding-left: 4px">Marzo</td>
            <td width="95" style="padding-left: 4px">Abril</td>
            <td width="95" style="padding-left: 4px">Mayo</td>
            <td width="95" style="padding-left: 4px">Junio</td>
            <td width="95" style="padding-left: 4px">Julio</td>
            <td width="95" style="padding-left: 4px">Agosto</td>
            <td width="95" style="padding-left: 4px">Septiembre</td>
            <td width="95" style="padding-left: 4px">Octubre</td>
            <td width="95" style="padding-left: 4px">Nomviembre</td>
            <td width="95" style="padding-left: 4px">Diciembre</td>
        </tr>
        <?php for($i=0; $i<count($list); $i++){ $r=$i+1; if($i % 2 == 0){ $c = "color02"; }else{ $c = "color01"; } ?>
        <tr>
            <td><?php echo $r; ?></td>
            <td align="left" style="padding: 2px 4px"><?php echo $list[$i]['apellido_p']; ?> <?php echo $list[$i]['apellido_m']; ?> <?php echo $list[$i]['nombres']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>


<?php if($tipo == 3){ ?>

    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="2"><img src="../images/hada2.jpg" style="width: 162px"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 20px">Asistencia Por Nivel <?php echo $admin_curso['resultado'][0]['nombre']; ?></td>
        </tr>
        <tr>
            <td width="300" style="padding-top: 25px">Educadora: _________________</td>
            <td width="300" style="padding-top: 25px;">Fecha: __________/__________</td>
        </tr>
    </table>
    <br><br><br>
    <table cellspacing="0" cellpadding="0" class="tabla" border="1" width="1300px">
        <tr class="td1">
            <td width="20">#</td>
            <td style="text-align: left; padding: 2px 4px" width="288">Nombre</td>
            <?php for($m=1; $m<=31; $m++){ ?>
            <td width="32"><?php echo $m; ?></td>
            <?php } ?>
        </tr>
        <?php for($i=0; $i<count($list); $i++){ $r=$i+1; if($i % 2 == 0){ $c = "color02"; }else{ $c = "color01"; } ?>
        <tr>
            <td><?php echo $r; ?></td>
            <td align="left" style="padding: 2px 4px">- <?php echo $list[$i]['apellido_p']; ?> <?php echo $list[$i]['apellido_m']; ?> <?php echo $list[$i]['nombres']; ?> </td>
            <?php for($m=1; $m<=31; $m++){ ?>
            <td></td>
            <?php } ?>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td style="padding: 2px 4px">Total Presentes</td>
            <?php for($m=1; $m<=31; $m++){ ?>
            <td></td>
            <?php } ?>
        </tr>
        <tr>
            <td></td>
            <td style="padding: 2px 4px">Total Ausentes</td>
            <?php for($m=1; $m<=31; $m++){ ?>
            <td></td>
            <?php } ?>
        </tr>
        <tr>
            <td></td>
            <td style="padding: 2px 4px">Total Atrasados</td>
            <?php for($m=1; $m<=31; $m++){ ?>
            <td></td>
            <?php } ?>
        </tr>
        <tr>
            <td></td>
            <td style="padding: 2px 4px">Total Retirados</td>
            <?php for($m=1; $m<=31; $m++){ ?>
            <td></td>
            <?php } ?>
        </tr>
    </table>
<?php } ?>


<?php if($tipo == 2){ ?>

    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="2"><img src="../images/hada2.jpg" style="width: 162px"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 18px; padding-top: 5px;">Informacion</td>
        </tr>
    </table>

<table cellspacing="0" cellpadding="0" class="tabla" border="1" width="1300px" style="margin-top: 25px">
    
    <tr class="td2">
        
        <td width="15">#</td>
        <td width="40">Matri</td>
        <td width="160">Nombre</td>
        <td width="80">Rut</td>
        <td width="60">Curso</td>
        <td width="60">Fecha Nac</td>
        <td width="30">Sexo</td>
        <td width="150">Direccion</td>
        <td width="60">Fecha Mat</td>
        <td width="60">Fecha Ing</td>
        
	<td width="60">Reglamento</td>        

        <td width="60">Apoderado</td>
        <td width="60">Telefono</td>
        <td width="60">Email</td>

        <td width="60">Mama</td>
        <td width="60">Celular</td>
        
        <td width="60">Papa</td>
        <td width="60">Celular</td>
        
        <td width="60">Obervaciones</td>
        <td width="60">Fecha Retiro</td>
        <td width="45">Motivo Retiro</td>
        
    </tr>
    
    
    <?php 
    
    for($i=0; $i<count($list); $i++){ 
        $f = $i + 1;
	$f_n = "";
	$f_i = "";
	$f_m = "";
	$f_r = "";

        if($list[$i]['fecha_nacimiento'] != "0000-00-00"){
            $f_n = date("d/m/Y", strtotime($list[$i]['fecha_nacimiento']));
        }
        if($list[$i]['fecha_ingreso'] != "0000-00-00"){
            $f_i = date("d/m/Y", strtotime($list[$i]['fecha_ingreso']));
        }
        if($list[$i]['fecha_matricula'] != "0000-00-00"){
            $f_m = date("d/m/Y", strtotime($list[$i]['fecha_matricula']));
        }
        if($list[$i]['fecha_retiro'] != "0000-00-00"){
            $f_r = date("d/m/Y", strtotime($list[$i]['fecha_retiro']));
        }
        
	if($list[$i]['rr'] == 0){
            $rr = "";
        }
	if($list[$i]['rr'] == 1){
            $rr = "Si";
        }
	if($list[$i]['rr'] == 2){
            $rr = "No";
        }

        if($list[$i]['motivo_retiro'] == 0){
            $m = "";
        }
        if($list[$i]['motivo_retiro'] == 1){
            $m = "Cumplio 2 Años";
        }
        if($list[$i]['motivo_retiro'] == 2){
            $m = "Efermedad";
        }
        if($list[$i]['motivo_retiro'] == 3){
            $m = "Decision Padres";
        }
        if($list[$i]['motivo_retiro'] == 4){
            $m = "Egreso";
        }
        
        if($list[$i]['nmatricula'] == 0){ 
            $list[$i]['nmatricula'] = $list[$i]['id_alu'] + 400; 
        }
        
        $cur = $admin->sql("SELECT * FROM ".$db_var_name."_cursos WHERE id_cur='".$list[$i]['id_cur']."'");
        $curso = $cur['resultado'][0]['nombre'];
        
        ?>
    
    <tr class="td3">
        
        <td align="center"><?php echo $f; ?></td>
        <td><?php echo $list[$i]['nmatricula']; ?></td>
        <td><?php echo $list[$i]['apellido_p']." ".$list[$i]['apellido_m']." ".$list[$i]['nombres']; ?></td>
        <td><?php echo $list[$i]['rut']; ?></td>
        <td><?php echo $curso; ?></td>
        <td align="center"><?php echo $f_n; ?></td>
        <td align="center"><?php echo ($list[$i]['sexo'] == 1)? "M" : "F"; ?></td>
        <td><?php echo $list[$i]['direccion']; ?></td>
        <td align="center"><?php echo $f_i; ?></td>
        <td align="center"><?php echo $f_m; ?></td>
	<td align="center"><?php echo $rr; ?></td>
        <td><?php echo $list[$i]['nombre_apoderado']; ?></td>
        <td><?php echo $list[$i]['telefono_apoderado']; ?></td>
        <td><?php echo $list[$i]['email_apoderado']; ?></td>
        
        <td><?php echo $list[$i]['nombre_01']; ?></td>
        <td><?php echo $list[$i]['celular_01']; ?></td>
        <td><?php echo $list[$i]['nombre_02']; ?></td>
        <td><?php echo $list[$i]['celular_02']; ?></td>
        
        <td><?php echo $list[$i]['observaciones']; ?></td>
        <td align="center"><?php echo $f_r; ?></td>
        <td><?php echo $m; ?></td>
    </tr>
    
    <?php } ?>
</table>
<?php } ?>
    <?php if($tipo == 4){ ?>

    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="2"><img src="../images/hada2.jpg" style="width: 162px"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 18px; padding-top: 5px;">Datos Generales</td>
        </tr>
    </table>

<table cellspacing="0" cellpadding="0" class="tabla" border="1" width="1300px" style="margin-top: 25px">
    <tr style="font-size: 24px; padding: 7px 0px;">
        <td colspan="2" align="center">Alumno</td>
        <td colspan="2" align="center">Mama</td>
        <td colspan="2" align="center">Papa</td>
    </tr>
    <tr style="font-size: 22px; padding: 5px 0px;">
        <td width="20">#</td>
        <td width="360">Nombre</td>
        <td width="230">Nombre</td>
        <td width="230">Celular</td>
        <td width="230">Nombre</td>
        <td width="230">Celular</td>
    </tr>
    
    <?php
    for($i=0; $i<count($list); $i++){ $f = $i + 1;
    ?>
    
    <tr style="font-size: 20px; padding: 3px 0px;">
        
        <td><?php echo $f; ?></td>
        <td><?php echo $list[$i]['apellido_p']." ".$list[$i]['apellido_m']." ".$list[$i]['nombres']; ?></td>
        <td><?php echo $list[$i]['nombre_01']; ?></td>
        <td><?php echo $list[$i]['celular_01']; ?></td>
        <td><?php echo $list[$i]['nombre_02']; ?></td>
        <td><?php echo $list[$i]['celular_02']; ?></td>
        
    </tr>
    
    <?php } ?>
    </html>
<?php } ?>
</body>
</html>
<?php

    function mes($i){
            
        if($i == 1) return "Enero";
        if($i == 2) return "Febrero";
        if($i == 3) return "Marzo";
        if($i == 4) return "Abril";
        if($i == 5) return "Mayo";
        if($i == 6) return "Junio";
        if($i == 7) return "Julio";
        if($i == 8) return "Agosto";
        if($i == 9) return "Septiembre";
        if($i == 10) return "Ocubre";
        if($i == 11) return "Noviembre";
        if($i == 12) return "Diciembre";
            
    }
        
?>