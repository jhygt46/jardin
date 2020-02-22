<?php

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."jardin/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."jardin/");
}

require_once DIR."db.php";
require_once DIR_BASE."config/config.php";

class Conexion {

    public $host = null;
    public $usuario = null;
    public $password = null;
    public $base_datos = null;

    public function __construct(){

        global $db_host;
        global $db_user;
        global $db_password;
        global $db_database;

        $this->host	= $db_host;
        $this->usuario = $db_user;
        $this->password = $db_password;
        $this->base_datos = $db_database;

    }

    private function conexion($r){

        $this->con = mysql_connect($this->host[$r], $this->usuario[$r], $this->password[$r]);
        $error_mysql = mysql_error();
        if($error_mysql != ''){
            $resultado['estado']	= false;
            $resultado['mensaje']	= 'Error en la conexion con servidor';
            $resultado['error']	= $error_mysql;
        }else {
            $db = mysql_select_db($this->base_datos[$r]);
            $error_mysql = mysql_error();
            if($error_mysql != '') {
                    $resultado['estado']	= false;
                    $resultado['mensaje']	= 'Error al seleccionar la base de datos';
                    $resultado['error']	= $error_mysql;
            }
            else {
                    $resultado['estado']	= true;
            }
        }
        return $resultado;

    }


    public function sql($sql) {

        if (preg_match("/select/i", $sql)) {
            $r = rand(1, count($this->host) - 1);
        }else{
            $r = 0;
        }

        $this->conexion($r);
        $result = @mysql_query($sql);
        $error_mysql = mysql_error();

        if($error_mysql != ''){
            $resultado['estado'] = false;
            $resultado['query'] = $sql;
            $resultado['error'] = $error_mysql;
        }else{
            $resultado['estado'] = true;
            $resultado['query'] = $sql;
        }

        if (preg_match("/insert/i", $sql)){
                $resultado['insert_id'] = mysql_insert_id();
        }
        if (preg_match("/update/i", $sql)){
                $resultado['update_rows'] = mysql_affected_rows();
        }
        if (preg_match("/delete/i", $sql)){

        }
        if (preg_match("/select/i", $sql)){
            while($row = @mysql_fetch_array($result, MYSQL_ASSOC)){
                $resultado['resultado'][] = $row;
            }
        }
        $resultado['count'] = count($resultado['resultado']);	
        @mysql_free_result($result);
        return $resultado;

    }

    public function __destruct(){
        @mysql_close($this->con);
    }


}

?>