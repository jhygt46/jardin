<?php

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."medici/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."medici/");
}

require_once DIR."db.php";
require_once DIR_BASE."config/config.php";
$con = new mysqli($db_host[0], $db_user[0], $db_password[0]);

$tablas[0]['nombre'] = 'usuarios';
$tablas[0]['campos'][0]['nombre'] = 'id_user';
$tablas[0]['campos'][0]['tipo'] = 'int(4)';
$tablas[0]['campos'][0]['null'] = 0;
$tablas[0]['campos'][0]['pk'] = 1;
$tablas[0]['campos'][0]['ai'] = 1;
$tablas[0]['campos'][1]['nombre'] = 'nombre';
$tablas[0]['campos'][1]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[0]['campos'][1]['null'] = 0;
$tablas[0]['campos'][1]['values'] = ["Eliana Bruzzone"];
$tablas[0]['campos'][2]['nombre'] = 'correo';
$tablas[0]['campos'][2]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[0]['campos'][2]['null'] = 0;
$tablas[0]['campos'][2]['values'] = ["elibruzzo@hotmail.com"];
$tablas[0]['campos'][3]['nombre'] = 'pass';
$tablas[0]['campos'][3]['tipo'] = 'varchar(32) COLLATE utf8_spanish2_ci';
$tablas[0]['campos'][3]['null'] = 0;
$tablas[0]['campos'][3]['values'] = ["bed319758c912ff419e1f0722468e572"];
$tablas[0]['campos'][4]['nombre'] = 'intentos';
$tablas[0]['campos'][4]['tipo'] = 'smallint(2)';
$tablas[0]['campos'][4]['null'] = 0;
$tablas[0]['campos'][4]['values'] = [0];
$tablas[0]['campos'][5]['nombre'] = 'fecha_creado';
$tablas[0]['campos'][5]['tipo'] = 'datetime';
$tablas[0]['campos'][5]['null'] = 0;
$tablas[0]['campos'][5]['values'] = ["2017-06-02 15:22:33"];
$tablas[0]['campos'][6]['nombre'] = 'block';
$tablas[0]['campos'][6]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][6]['null'] = 0;
$tablas[0]['campos'][6]['values'] = [0];
$tablas[0]['campos'][7]['nombre'] = 'fecha_block';
$tablas[0]['campos'][7]['tipo'] = 'datetime';
$tablas[0]['campos'][7]['null'] = 0;
$tablas[0]['campos'][7]['values'] = ["2017-06-02 15:22:33"];
$tablas[0]['campos'][8]['nombre'] = 'id_page';
$tablas[0]['campos'][8]['tipo'] = 'int(4)';
$tablas[0]['campos'][8]['null'] = 0;
$tablas[0]['campos'][8]['values'] = [1];
$tablas[0]['campos'][9]['nombre'] = 'admin';
$tablas[0]['campos'][9]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][9]['null'] = 0;
$tablas[0]['campos'][9]['values'] = [1];
$tablas[0]['campos'][10]['nombre'] = 'eliminado';
$tablas[0]['campos'][10]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][10]['null'] = 0;
$tablas[0]['campos'][10]['values'] = [0];
$tablas[0]['campos'][11]['nombre'] = 'tipo';
$tablas[0]['campos'][11]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][11]['null'] = 0;
$tablas[0]['campos'][11]['values'] = [0];
$tablas[0]['campos'][12]['nombre'] = 'code_cookie';
$tablas[0]['campos'][12]['tipo'] = 'varchar(50) COLLATE utf8_spanish2_ci';
$tablas[0]['campos'][12]['null'] = 0;
$tablas[0]['campos'][12]['values'] = [""];
$tablas[0]['campos'][13]['nombre'] = 'perm_ingreso';
$tablas[0]['campos'][13]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][13]['null'] = 0;
$tablas[0]['campos'][13]['values'] = [0];
$tablas[0]['campos'][14]['nombre'] = 'perm_existente';
$tablas[0]['campos'][14]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][14]['null'] = 0;
$tablas[0]['campos'][14]['values'] = [0];
$tablas[0]['campos'][15]['nombre'] = 'perm_prestamo';
$tablas[0]['campos'][15]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][15]['null'] = 0;
$tablas[0]['campos'][15]['values'] = [0];
$tablas[0]['campos'][16]['nombre'] = 'perm_devolucion';
$tablas[0]['campos'][16]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][16]['null'] = 0;
$tablas[0]['campos'][16]['values'] = [0];
$tablas[0]['campos'][17]['nombre'] = 'perm_historial';
$tablas[0]['campos'][17]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][17]['null'] = 0;
$tablas[0]['campos'][17]['values'] = [0];
$tablas[0]['campos'][18]['nombre'] = 'perm_edicion';
$tablas[0]['campos'][18]['tipo'] = 'tinyint(1)';
$tablas[0]['campos'][18]['null'] = 0;
$tablas[0]['campos'][18]['values'] = [0];

$tablas[1]['nombre'] = '_jardinva_cursos';
$tablas[1]['campos'][0]['nombre'] = 'id_cur';
$tablas[1]['campos'][0]['tipo'] = 'int(4)';
$tablas[1]['campos'][0]['null'] = 0;
$tablas[1]['campos'][0]['pk'] = 1;
$tablas[1]['campos'][0]['ai'] = 1;
$tablas[1]['campos'][1]['nombre'] = 'nombre';
$tablas[1]['campos'][1]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[1]['campos'][1]['null'] = 0;
$tablas[1]['campos'][2]['nombre'] = 'parent_id';
$tablas[1]['campos'][2]['tipo'] = 'tinyint(4)';
$tablas[1]['campos'][2]['null'] = 0;
$tablas[1]['campos'][3]['nombre'] = 'eliminado';
$tablas[1]['campos'][3]['tipo'] = 'tinyint(1)';
$tablas[1]['campos'][3]['null'] = 0;
$tablas[1]['campos'][4]['nombre'] = 'orders';
$tablas[1]['campos'][4]['tipo'] = 'tinyint(4)';
$tablas[1]['campos'][4]['null'] = 0;
$tablas[1]['campos'][5]['nombre'] = 'id_page';
$tablas[1]['campos'][5]['tipo'] = 'tinyint(4)';
$tablas[1]['campos'][5]['null'] = 0;

$tablas[2]['nombre'] = '_jardinva_alumnos';
$tablas[2]['campos'][0]['nombre'] = 'id_alu';
$tablas[2]['campos'][0]['tipo'] = 'int(4)';
$tablas[2]['campos'][0]['null'] = 0;
$tablas[2]['campos'][0]['pk'] = 1;
$tablas[2]['campos'][0]['ai'] = 1;
$tablas[2]['campos'][1]['nombre'] = 'nmatricula';
$tablas[2]['campos'][1]['tipo'] = 'int(4)';
$tablas[2]['campos'][1]['null'] = 0;
$tablas[2]['campos'][2]['nombre'] = 'nombres';
$tablas[2]['campos'][2]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][2]['null'] = 0;
$tablas[2]['campos'][3]['nombre'] = 'apellido_p';
$tablas[2]['campos'][3]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][3]['null'] = 0;
$tablas[2]['campos'][4]['nombre'] = 'apellido_m';
$tablas[2]['campos'][4]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][4]['null'] = 0;
$tablas[2]['campos'][5]['nombre'] = 'rut';
$tablas[2]['campos'][5]['tipo'] = 'varchar(30) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][5]['null'] = 0;
$tablas[2]['campos'][6]['nombre'] = 'sexo';
$tablas[2]['campos'][6]['tipo'] = 'tinyint(1)';
$tablas[2]['campos'][6]['null'] = 0;
$tablas[2]['campos'][7]['nombre'] = 'direccion';
$tablas[2]['campos'][7]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][7]['null'] = 0;
$tablas[2]['campos'][8]['nombre'] = 'id_cur';
$tablas[2]['campos'][8]['tipo'] = 'int(4)';
$tablas[2]['campos'][8]['null'] = 0;
$tablas[2]['campos'][8]['k'] = 1;
$tablas[2]['campos'][8]['kt'] = 1;
$tablas[2]['campos'][8]['kc'] = 0;
$tablas[2]['campos'][9]['nombre'] = 'fecha_nacimiento';
$tablas[2]['campos'][9]['tipo'] = 'date';
$tablas[2]['campos'][9]['null'] = 0;
$tablas[2]['campos'][10]['nombre'] = 'fecha_matricula';
$tablas[2]['campos'][10]['tipo'] = 'date';
$tablas[2]['campos'][10]['null'] = 0;
$tablas[2]['campos'][11]['nombre'] = 'fecha_ingreso';
$tablas[2]['campos'][11]['tipo'] = 'date';
$tablas[2]['campos'][11]['null'] = 0;
$tablas[2]['campos'][12]['nombre'] = 'fecha_creado';
$tablas[2]['campos'][12]['tipo'] = 'datetime';
$tablas[2]['campos'][12]['null'] = 0;
$tablas[2]['campos'][13]['nombre'] = 'fecha_retiro';
$tablas[2]['campos'][13]['tipo'] = 'date';
$tablas[2]['campos'][13]['null'] = 0;
$tablas[2]['campos'][14]['nombre'] = 'motivo_retiro';
$tablas[2]['campos'][14]['tipo'] = 'tinyint(1)';
$tablas[2]['campos'][14]['null'] = 0;
$tablas[2]['campos'][15]['nombre'] = 'observaciones';
$tablas[2]['campos'][15]['tipo'] = 'text';
$tablas[2]['campos'][15]['null'] = 0;
$tablas[2]['campos'][16]['nombre'] = 'nombre_apoderado';
$tablas[2]['campos'][16]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][16]['null'] = 0;
$tablas[2]['campos'][17]['nombre'] = 'telefono_apoderado';
$tablas[2]['campos'][17]['tipo'] = 'varchar(30) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][17]['null'] = 0;
$tablas[2]['campos'][18]['nombre'] = 'email_apoderado';
$tablas[2]['campos'][18]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][18]['null'] = 0;
$tablas[2]['campos'][19]['nombre'] = 'nombre_01';
$tablas[2]['campos'][19]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][19]['null'] = 0;
$tablas[2]['campos'][20]['nombre'] = 'celular_01';
$tablas[2]['campos'][20]['tipo'] = 'varchar(30) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][20]['null'] = 0;
$tablas[2]['campos'][21]['nombre'] = 'email_01';
$tablas[2]['campos'][21]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][21]['null'] = 0;
$tablas[2]['campos'][22]['nombre'] = 'nombre_02';
$tablas[2]['campos'][22]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][22]['null'] = 0;
$tablas[2]['campos'][23]['nombre'] = 'celular_02';
$tablas[2]['campos'][23]['tipo'] = 'varchar(30) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][23]['null'] = 0;
$tablas[2]['campos'][24]['nombre'] = 'email_02';
$tablas[2]['campos'][24]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[2]['campos'][24]['null'] = 0;
$tablas[2]['campos'][25]['nombre'] = 'eliminado';
$tablas[2]['campos'][25]['tipo'] = 'tinyint(1)';
$tablas[2]['campos'][25]['null'] = 0;
$tablas[2]['campos'][26]['nombre'] = 'orders';
$tablas[2]['campos'][26]['tipo'] = 'int(4)';
$tablas[2]['campos'][26]['null'] = 0;
$tablas[2]['campos'][27]['nombre'] = 'id_page';
$tablas[2]['campos'][27]['tipo'] = 'int(4)';
$tablas[2]['campos'][27]['null'] = 0;
$tablas[2]['campos'][28]['nombre'] = 'rr';
$tablas[2]['campos'][28]['tipo'] = 'int(4)';
$tablas[2]['campos'][28]['null'] = 0;

$tablas[3]['nombre'] = '_jardinva_libros';
$tablas[3]['campos'][0]['nombre'] = 'id_lib';
$tablas[3]['campos'][0]['tipo'] = 'int(4)';
$tablas[3]['campos'][0]['null'] = 0;
$tablas[3]['campos'][0]['pk'] = 1;
$tablas[3]['campos'][0]['ai'] = 1;
$tablas[3]['campos'][1]['nombre'] = 'nombre';
$tablas[3]['campos'][1]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[3]['campos'][1]['null'] = 0;
$tablas[3]['campos'][2]['nombre'] = 'codigo';
$tablas[3]['campos'][2]['tipo'] = 'varchar(20) COLLATE utf8_spanish2_ci';
$tablas[3]['campos'][2]['null'] = 0;
$tablas[3]['campos'][3]['nombre'] = 'qr';
$tablas[3]['campos'][3]['tipo'] = 'varchar(30) COLLATE utf8_spanish2_ci';
$tablas[3]['campos'][3]['null'] = 0;
$tablas[3]['campos'][4]['nombre'] = 'fecha_ingreso';
$tablas[3]['campos'][4]['tipo'] = 'datetime';
$tablas[3]['campos'][4]['null'] = 0;
$tablas[3]['campos'][5]['nombre'] = 'eliminado';
$tablas[3]['campos'][5]['tipo'] = 'tinyint(1)';
$tablas[3]['campos'][5]['null'] = 0;

$tablas[4]['nombre'] = '_jardinva_boletas';
$tablas[4]['campos'][0]['nombre'] = 'id_bol';
$tablas[4]['campos'][0]['tipo'] = 'int(4)';
$tablas[4]['campos'][0]['null'] = 0;
$tablas[4]['campos'][0]['pk'] = 1;
$tablas[4]['campos'][0]['ai'] = 1;
$tablas[4]['campos'][1]['nombre'] = 'numero';
$tablas[4]['campos'][1]['tipo'] = 'smallint(2)';
$tablas[4]['campos'][1]['null'] = 0;
$tablas[4]['campos'][2]['nombre'] = 'dia';
$tablas[4]['campos'][2]['tipo'] = 'smallint(2)';
$tablas[4]['campos'][2]['null'] = 0;
$tablas[4]['campos'][3]['nombre'] = 'mes';
$tablas[4]['campos'][3]['tipo'] = 'smallint(2)';
$tablas[4]['campos'][3]['null'] = 0;
$tablas[4]['campos'][4]['nombre'] = 'ano';
$tablas[4]['campos'][4]['tipo'] = 'smallint(2)';
$tablas[4]['campos'][4]['null'] = 0;
$tablas[4]['campos'][5]['nombre'] = 'tipo';
$tablas[4]['campos'][5]['tipo'] = 'tinyint(1)';
$tablas[4]['campos'][5]['null'] = 0;
$tablas[4]['campos'][6]['nombre'] = 'nula';
$tablas[4]['campos'][6]['tipo'] = 'tinyint(1)';
$tablas[4]['campos'][6]['null'] = 0;
$tablas[4]['campos'][7]['nombre'] = 'matricula';
$tablas[4]['campos'][7]['tipo'] = 'int(4)';
$tablas[4]['campos'][7]['null'] = 0;
$tablas[4]['campos'][8]['nombre'] = 'mjardin';
$tablas[4]['campos'][8]['tipo'] = 'int(4)';
$tablas[4]['campos'][8]['null'] = 0;
$tablas[4]['campos'][9]['nombre'] = 'msalacuna';
$tablas[4]['campos'][9]['tipo'] = 'int(4)';
$tablas[4]['campos'][9]['null'] = 0;
$tablas[4]['campos'][10]['nombre'] = 'eliminado';
$tablas[4]['campos'][10]['tipo'] = 'tinyint(1)';
$tablas[4]['campos'][10]['null'] = 0;
$tablas[4]['campos'][11]['nombre'] = 'id_page';
$tablas[4]['campos'][11]['tipo'] = 'int(4)';
$tablas[4]['campos'][11]['null'] = 0;

$tablas[5]['nombre'] = '_jardinva_prestamos';
$tablas[5]['campos'][0]['nombre'] = 'id_pre';
$tablas[5]['campos'][0]['tipo'] = 'int(4)';
$tablas[5]['campos'][0]['null'] = 0;
$tablas[5]['campos'][0]['pk'] = 1;
$tablas[5]['campos'][0]['ai'] = 1;
$tablas[5]['campos'][1]['nombre'] = 'id_lib';
$tablas[5]['campos'][1]['tipo'] = 'int(4)';
$tablas[5]['campos'][1]['null'] = 0;
$tablas[5]['campos'][1]['k'] = 1;
$tablas[5]['campos'][1]['kt'] = 3;
$tablas[5]['campos'][1]['kc'] = 0;
$tablas[5]['campos'][2]['nombre'] = 'id_alu';
$tablas[5]['campos'][2]['tipo'] = 'int(4)';
$tablas[5]['campos'][2]['null'] = 0;
$tablas[5]['campos'][1]['k'] = 1;
$tablas[5]['campos'][1]['kt'] = 2;
$tablas[5]['campos'][1]['kc'] = 0;
$tablas[5]['campos'][3]['nombre'] = 'id_user_presto';
$tablas[5]['campos'][3]['tipo'] = 'int(4)';
$tablas[5]['campos'][3]['null'] = 0;
$tablas[5]['campos'][4]['nombre'] = 'fecha_presto';
$tablas[5]['campos'][4]['tipo'] = 'datetime';
$tablas[5]['campos'][4]['null'] = 0;
$tablas[5]['campos'][5]['nombre'] = 'id_user_devolvio';
$tablas[5]['campos'][5]['tipo'] = 'int(4)';
$tablas[5]['campos'][5]['null'] = 0;
$tablas[5]['campos'][6]['nombre'] = 'fecha_devolvio';
$tablas[5]['campos'][6]['tipo'] = 'datetime';
$tablas[5]['campos'][6]['null'] = 0;
$tablas[5]['campos'][7]['nombre'] = 'email';
$tablas[5]['campos'][7]['tipo'] = 'tinyint(1)';
$tablas[5]['campos'][7]['null'] = 0;
$tablas[5]['campos'][8]['nombre'] = 'estado';
$tablas[5]['campos'][8]['tipo'] = 'tinyint(1)';
$tablas[5]['campos'][8]['null'] = 0;
$tablas[5]['campos'][9]['nombre'] = 'comentarios';
$tablas[5]['campos'][9]['tipo'] = 'varchar(255) COLLATE utf8_spanish2_ci';
$tablas[5]['campos'][9]['null'] = 0;











for($i=0; $i<count($tablas); $i++){

    $tabla = $tablas[$i];
    $datas = get_data($tabla["nombre"]);
    $pk = []; $k = []; $v = []; $vp = [];

    for($j=0; $j<count($tabla['campos']); $j++){
        $campo = $tabla['campos'][$j];
        if(isset($campo['pk'])){
            $pk[] = $campo['nombre'];
        }
        if(isset($campo['k']) || isset($campo['pk'])){
            $k[] = $campo['nombre'];
        }
    }
    for($j=0; $j<count($datas); $j++){

        $data = $datas[$j];
        for($m=0; $m<count($k); $m++){
            $v[] = get_valor($data, $k[$m]);
        }
        $sql = "INSERT INTO ".$tabla["nombre"]." (".implode(",", $k).") VALUES (".implode(",", $v).")";
        echo $sql."<br/>";
        
        for($m=0; $m<count($pk); $m++){
            $where = $pk[$m]."='".get_valor($data, $k[$m])."'";
        }
        
        foreach($data as $key => $value){
            if(!in_array($k, $key)){
                $sql2 = "UPDATE ".$tabla["nombre"]." SET ".$key."='".$value."' WHERE ".implode(" AND ", $where);
                echo $sql2."<br/>";
            }
        }
    }

}
function get_data($tabla){
    return json_decode(file_get_contents("http://www.jardinvalleencantado.cl/aux.php?aux=".$tabla));
}
function get_valor($array, $campo){
    foreach($array as $clave => $valor){
        if($clave == $campos){
            return $valor;
        }
    }
}

exit;

for($i=0; $i<count($tablas); $i++){

    $tabla = "CREATE TABLE IF NOT EXISTS `".$tablas[$i]["nombre"]."` (";
    $aux_t = [];
    for($j=0; $j<count($tablas[$i]["campos"]); $j++){
        $aux = "`".$tablas[$i]["campos"][$j]["nombre"]."` ".$tablas[$i]["campos"][$j]["tipo"];
        $aux .= ($tablas[$i]["campos"][$j]["null"] == 0) ? " NOT NULL" : " NULL" ;
        $aux_t[] = $aux;
    }
    $tabla .= implode(",", $aux_t).") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
    $tables[] = $tabla;
    $tables_name[] = $tablas[$i]["nombre"];
    
}
for($i=0; $i<count($tablas); $i++){

    $key = "ALTER TABLE `".$tablas[$i]["nombre"]."`";
    $aux_t = [];
    $aux_c = [];
    $pk = [];
    $c = 1;

    for($j=0; $j<count($tablas[$i]["campos"]); $j++){
        if(isset($tablas[$i]["campos"][$j]['pk'])){
            $pk[] = "`".$tablas[$i]["campos"][$j]["nombre"]."`";
        }
        if(isset($tablas[$i]["campos"][$j]['k'])){
            $aux_t[] = " ADD KEY `".$tablas[$i]["campos"][$j]["nombre"]."` (`".$tablas[$i]["campos"][$j]["nombre"]."`)";
            if(isset($tablas[$i]["campos"][$j]['kt']) && isset($tablas[$i]["campos"][$j]['kc'])){
                $aux_c[] = " ADD CONSTRAINT `".$tablas[$i]["nombre"]."_ibfk_".$c."` FOREIGN KEY (`".$tablas[$i]["campos"][$j]["nombre"]."`) REFERENCES `".$tablas[$tablas[$i]["campos"][$j]['kt']]["nombre"]."` (`".$tablas[$tablas[$i]["campos"][$j]['kt']]["campos"][$tablas[$i]["campos"][$j]['kc']]["nombre"]."`) ON DELETE CASCADE ON UPDATE CASCADE";
                $c++;
            }
        }
        if(isset($tablas[$i]["campos"][$j]['ai'])){
            $ai = $key;
            $ai .= " MODIFY `".$tablas[$i]["campos"][$j]["nombre"]."` ".$tablas[$i]["campos"][$j]["tipo"]."";
            $ai .= ($tablas[$i]["campos"][$j]["null"] == 0) ? " NOT NULL" : " NULL" ;
            $ai .= " AUTO_INCREMENT, AUTO_INCREMENT=1;";
            $ais[] = $ai;
        }
    }
    
    if(count($aux_t) > 0 || count($pk) > 0){
        $aux_key = $key;
        if(count($pk) > 0){
            $aux_key .= " ADD PRIMARY KEY (".implode(",", $pk).")";
            if(count($aux_t) > 0){
                $aux_key .= ",";
            }
        }
        if(count($aux_t) > 0){
            $aux_key .= implode(",", $aux_t);
        }
        $keys[] = $aux_key;
    }
    if(count($aux_c) > 0){
        $cons[] = $key.implode(",", $aux_c).";";
    }

}

if($con->query("CREATE DATABASE IF NOT EXISTS ".$db_database[0]." CHARACTER SET UTF8 COLLATE UTF8_GENERAL_CI")){
    echo "BASE CREADA: ".$db_database[0]."<br/><br/>TABLAS<br/><br/>";
    $con->select_db($db_database[0]);
    for($i=0; $i<count($tables); $i++){
        if($con->query($tables[$i])){
            echo "Tabla creada: ".$tables_name[$i]."<br/>";
        }else{
            echo "<strong>ERROR: ".$tables_name[$i]." NO FUE CREADA</strong> => ".$con->error."<br/>";
        }
    }
    echo "<br/><br/>KEYS<br/><br/>";
    for($i=0; $i<count($keys); $i++){
        echo $keys[$i]."<br/>";
        if($con->query($keys[$i])){
            echo "ALTER CREADO: <br/>";
        }else{
            echo "<strong>ERROR: KEY </strong> => ".$con->error."<br/>";
        }
    }
    echo "<br/><br/>AUTOINCREMENTS<br/><br/>";
    for($i=0; $i<count($ais); $i++){
        echo $ais[$i]."<br/>";
        if($con->query($ais[$i])){
            echo "ALTER CREADO: <br/>";
        }else{
            echo "<strong>ERROR: AUTO</strong> => ".$con->error."<br/>";
        }
    }

    echo "<br/><br/>FILTROS<br/><br/>";
    for($i=0; $i<count($cons); $i++){
        echo $cons[$i]."<br/>";
        if($con->query($cons[$i])){
            echo "ALTER CREADO: <br/>";
        }else{
            echo "<strong>ERROR: FILTRO</strong> => ".$con->error."<br/>";
        }
    }

    echo "<br/><br/>INSERT<br/><br/>";
    for($i=0; $i<count($tablas); $i++){

        $campos = [];
        $matriz = [];

        for($j=0; $j<count($tablas[$i]["campos"]); $j++){
            $cant = count($tablas[$i]["campos"][$j]["values"]);
            if($cant > 0){
                $campos[] = $tablas[$i]["campos"][$j]["nombre"];
                for($k=0; $k<$cant; $k++){
                    $matriz[$k][] = "'".$tablas[$i]["campos"][$j]["values"][$k]."'";
                }
            }
        }

        for($j=0; $j<count($matriz); $j++){
            $sql = "INSERT INTO ".$tablas[$i]["nombre"]." (".implode(", ", $campos).") VALUES (".implode(", ", $matriz[$j]).")";
            echo $sql."<br/>";
            if($con->query($sql)){
                echo "INSERTAR <br/>";
            }else{
                echo "<strong>ERROR: INSERT</strong> => ".$con->error."<br/>";
            }
        }

    }

}else{
    echo "ERROR CREAR BASE: ".$con->error."<br/>";
}

/*

*/