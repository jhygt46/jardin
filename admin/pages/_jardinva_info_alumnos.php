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
$list_ = $jardin->alumnos();
$curs_ = $jardin->cursos();

echo "<pre>";
print_r($list_);
echo "</pre>";
exit;

/* CONFIG PAGE */
$titulo = "Alumnos";
$titulo_list = "Lista de Alumnos";
$sub_titulo1 = "Ingresar Alumno";
$sub_titulo2 = "Modificar Alumno";
$accion = "_jardinva_crearalumnos";

$eliminaraccion = "_jardinva_eliminaralumnos";
$id_list = "id_alu";
$eliminarobjeto = "Alumno";
$page_mod = "pages/_jardinva_info_alumnos.php";
/* CONFIG PAGE */

$id = 0;
$sub_titulo = $sub_titulo1;
if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] != 0){
    
    $id = $_GET["id"];
    $sub_titulo = $sub_titulo2;
    $that = $jardin->alumno($id);

    if($that['nmatricula'] == 0){
        $that['nmatricula'] = $that['id_alu'] + 400;
    }
    
}


?>


<style>
    .padres{
        margin-left: 16%;
        width: 75%;
        padding: 15px 0px;
    }
    .padres li{
        float: left;
        width: 50%;
    }
    .padres li .padre{
        font-size: 22px;
    }
    .padres li span{
        display: block;
        padding-top: 10px;
    }
    .padres li input{
        width: 100%;
    }
</style>

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
                        <li class="ic4" onclick="openwn('pages/_jardinva_resumen.php?tipo=2', 1320, 650)" title="Informacion"></li>
                    </ul>
                </li>
                <li class="op">
                    <ul class="ss clearfix">
                        <li></li>
                        <li class="ic5" onclick="openwn('pages/_jardinva_resumen.php?tipo=4', 1320, 650)" title="Datos Generales"></li>
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
                        <span>N° de Matricula:</span>
                        <input id="nmatricula" type="text" value="<?php echo $that['nmatricula']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Rut:</span>
                        <input id="rut" type="text" value="<?php echo $that['rut']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Apellidos Paterno:</span>
                        <input id="apellido_p" type="text" value="<?php echo $that['apellido_p']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Apellidos Materno:</span>
                        <input id="apellido_m" type="text" value="<?php echo $that['apellido_m']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Nombres:</span>
                        <input id="nombres" type="text" value="<?php echo $that['nombres']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Sexo:</span>
                        <select id="sexo">
                            <option value="0">Seleccionar</option>
                            <option value="1" <?php if($that['sexo'] == 1){ echo "selected"; } ?>>Masculino</option>
                            <option value="2" <?php if($that['sexo'] == 2){ echo "selected"; } ?>>Femenino</option>
                        </select>
                        <div class="mensaje"></div>
                    </label>
		            <label>
                        <span>Recib&iacute; reglamento:</span>
                        <select id="rr">
                            <option value="0">Seleccionar</option>
                            <option value="1" <?php if($that['rr'] == 1){ echo "selected"; } ?>>Si</option>
                            <option value="2" <?php if($that['rr'] == 2){ echo "selected"; } ?>>No</option>
                        </select>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Fecha Nacimiento:</span>
                        <input id="fecha_nacimiento" type="text" value="<?php echo $that['fecha_nacimiento']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Fecha Matricula:</span>
                        <input id="fecha_matricula" type="text" value="<?php echo $that['fecha_matricula']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Fecha Ingreso:</span>
                        <input id="fecha_ingreso" type="text" value="<?php echo $that['fecha_ingreso']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Direccion:</span>
                        <input id="direccion" type="text" value="<?php echo $that['direccion']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Nombre Apoderado:</span>
                        <input id="nombre_apoderado" type="text" value="<?php echo $that['nombre_apoderado']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Telefono Apoderado:</span>
                        <input id="telefono_apoderado" type="text" value="<?php echo $that['telefono_apoderado']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Email Apoderado:</span>
                        <input id="email_apoderado" type="text" value="<?php echo $that['email_apoderado']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Fecha Retiro:</span>
                        <input id="fecha_retiro" type="text" value="<?php echo $that['fecha_retiro']; ?>" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Motivo Retiro:</span>
                        <select id="motivo_retiro">
                            <option value="0">Seleccionar</option>
                            <option value="1" <?php if($that['motivo_retiro'] == 1){ echo "selected"; } ?>>Cumpli&oacute; 2 a&ntilde;os</option>
                            <option value="2" <?php if($that['motivo_retiro'] == 2){ echo "selected"; } ?>>Enfermedad</option>
                            <option value="3" <?php if($that['motivo_retiro'] == 3){ echo "selected"; } ?>>Decision de Padres</option>
                            <option value="4" <?php if($that['motivo_retiro'] == 4){ echo "selected"; } ?>>Egreso</option>
                        </select>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Observaciones:</span>
                        <textarea id="observaciones"><?php echo $that['observaciones']; ?></textarea>
                        <div class="mensaje"></div>
                    </label>
                    <label>
                        <span>Curso:</span>
                        <select id="curso">
                            <?php for($i=0; $i<count($curs_); $i++){ $sel=""; if($curs_[$i]['id_cur'] == $that['id_cur']){ $sel = "selected"; } ?>
                            <option value="<?php echo $curs_[$i]['id_cur']; ?>" <?php echo $sel; ?>><?php echo $curs_[$i]['nombre']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="mensaje"></div>
                    </label>
                    <ul class="padres clearfix">
                        <li>
                            <div class="padre">Madre</div>
                            <span>Nombre:</span>
                            <input type="text" id="nombre_01" value="<?php echo $that['nombre_01']; ?>"></input>
                            <span>Tel celular:</span>
                            <input type="text" id="celular_01" value="<?php echo $that['celular_01']; ?>"></input>
                            <span>Email :</span>
                            <input type="text" id="email_01" value="<?php echo $that['email_01']; ?>"></input>
                        </li>
                        <li>
                            <div class="padre">Padre</div>
                            <span>Nombre:</span>
                            <input type="text" id="nombre_02" value="<?php echo $that['nombre_02']; ?>"></input>
                            <span>Tel celular:</span>
                            <input type="text" id="celular_02" value="<?php echo $that['celular_02']; ?>"></input>
                            <span>Email :</span>
                            <input type="text" id="email_02" value="<?php echo $that['email_02']; ?>"></input>
                        </li>
                    </ul>
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
        <div class="options">
            <ul class="ops clearfix">
                <li class="op">
                    <ul class="ss clearfix">
                        <li><input class="inptxt" type="text"></li>
                        <li class="ic1" onclick="opcs(this, 'name')" title="Nombre"></li>
                    </ul>
                </li>
                <li class="op">
                    <ul class="ss clearfix">
                        <li>
                            <select class="inpsel">
                                <option value='-1'>Todos</option>
                                <?php for($i=0; $i<count($curs); $i++){ ?>
                                <option value='<?php echo $curs[$i]['id_cur']; ?>'><?php echo $curs[$i]['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </li>
                        <li class="ic2" onclick="opcs(this, 'id_cur')" title="Curso"></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="name"><?php echo $titulo_list; ?></div>
        <div class="message"></div>
        <div class="sucont">
            
            <ul class='listUser'>
                
                <?php
                
                for($i=0; $i<count($list_); $i++){
                    $k = $i + 1;
                    $id = $list_[$i][$id_list];
                    $nombre = $k."- ".$list_[$i]['nombres']." ".$list_[$i]['apellido_p']." ".$list_[$i]['apellido_m'];
                    $id_cur = $list_[$i]['id_cur'];
                ?>
                
                <li class="user" rel="<?php echo $id; ?>">
                    <ul class="clearfix">
                        <li class="nombre" id_cur="<?php echo $id_cur; ?>" name="<?php echo $nombre; ?>"><?php echo $nombre; ?></li>
                        <a title="Eliminar" class="icn borrar" onclick="eliminar('<?php echo $eliminaraccion; ?>', <?php echo $id; ?>, '<?php echo $eliminarobjeto; ?>', '<?php echo $nombre; ?>')"></a>
                        <a title="Modificar" class="icn modificar" onclick="navlink('<?php echo $page_mod; ?>?id=<?php echo $id; ?>')"></a>
                    </ul>
                </li>
                
                <?php } ?>
                
            </ul>
            
        </div>
    </div>
</div>
<br />
<br />