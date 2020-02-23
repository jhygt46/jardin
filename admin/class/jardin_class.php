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

class Jardin{
    
    public $con = null;
    public $host = null;
    public $usuario = null;
    public $password = null;
    public $base_datos = null;
    public $eliminado = 0;

    public function __construct(){

        global $db_host;
        global $db_user;
        global $db_password;
        global $db_database;

        $this->host	= $db_host;
        $this->usuario = $db_user;
        $this->password = $db_password;
        $this->base_datos = $db_database;

        $this->con = new mysqli($this->host[0], $this->usuario[0], $this->password[0], $db_database[0]);
        
    }

    public function boletas($ano, $mes){

        if($sql = $this->con->prepare("SELECT * FROM _jardinva_boletas WHERE ano=? AND mes=? AND eliminado=?")){
            if($sql->bind_param("iii", $ano, $mes, $this->eliminado)){
                if($sql->execute()){

                    $info['lista'] = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

        $tipo = 1;
        if($sql = $this->con->prepare("SELECT MAX(numero) as max FROM _jardinva_boletas WHERE tipo=? AND eliminado=?")){
            if($sql->bind_param("ii", $tipo, $this->eliminado)){
                if($sql->execute()){

                    $info['max_boleta'] = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0]["max"] + 1;

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

        $tipo = 2;
        if($sql = $this->con->prepare("SELECT MAX(numero) as max FROM _jardinva_boletas WHERE tipo=? AND eliminado=?")){
            if($sql->bind_param("ii", $tipo, $this->eliminado)){
                if($sql->execute()){

                    $info['max_factura'] = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0]["max"] + 1;

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

        return $info;

    }
    public function boleta($id){

        if($sql = $this->con->prepare("SELECT ano, mes, dia, tipo, nula, matricula, mjardin, msalacuna, numero FROM _jardinva_boletas WHERE id_bol=? AND eliminado=?")){
            if($sql->bind_param("ii", $id, $this->eliminado)){
                if($sql->execute()){

                    return $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

    }
    public function cursos(){

        if($sql = $this->con->prepare("SELECT * FROM _jardinva_cursos WHERE eliminado=?")){
            if($sql->bind_param("i", $this->eliminado)){
                if($sql->execute()){

                    return $sql->get_result()->fetch_all(MYSQLI_ASSOC);

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

    }
    public function curso($id){

        if($sql = $this->con->prepare("SELECT * FROM _jardinva_cursos WHERE id_cur=? AND eliminado=?")){
            if($sql->bind_param("ii", $id, $this->eliminado)){
                if($sql->execute()){

                    return $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

    }
    public function usuarios(){

        if($sql = $this->con->prepare("SELECT * FROM usuarios WHERE eliminado=?")){
            if($sql->bind_param("i", $this->eliminado)){
                if($sql->execute()){

                    return $sql->get_result()->fetch_all(MYSQLI_ASSOC);

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

    }
    public function usuario($id){

        if($sql = $this->con->prepare("SELECT * FROM usuarios WHERE id_user=? AND eliminado=?")){
            if($sql->bind_param("ii", $id, $this->eliminado)){
                if($sql->execute()){

                    return $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

    }
    public function alumnos(){

        if($sql = $this->con->prepare("SELECT * FROM _jardinva_alumnos WHERE eliminado=?")){
            if($sql->bind_param("i", $this->eliminado)){
                if($sql->execute()){

                    return $sql->get_result()->fetch_all(MYSQLI_ASSOC);

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

    }
    public function alumno($id){

        if($sql = $this->con->prepare("SELECT * FROM _jardinva_alumnos WHERE id_alu=? AND eliminado=?")){
            if($sql->bind_param("ii", $id, $this->eliminado)){
                if($sql->execute()){

                    return $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

    }
    public function prestamos($id_alu){

        $fecha_devolvio = "0000-00-00 00:00:00";
        $id_user_devolvio = 0;

        if($id_alu > 0){
            if($sql = $this->con->prepare("SELECT t1.id_pre, t1.fecha_presto, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3 WHERE t1.id_alu=? AND t1.fecha_devolvio=? AND t1.id_user_devolvio=? AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib ORDER BY t1.fecha_presto")){
                if($sql->bind_param("isi", $id_alu, $fecha_devolvio, $id_user_devolvio)){
                    if($sql->execute()){
                        return $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
        if($id_alu == 0){
            if($sql = $this->con->prepare("SELECT t1.id_pre, t1.fecha_presto, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3 WHERE t1.fecha_devolvio=? AND t1.id_user_devolvio=? AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib ORDER BY t1.fecha_presto")){
                if($sql->bind_param("si", $fecha_devolvio, $id_user_devolvio)){
                    if($sql->execute()){
                        return $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }

    }
    public function resumen($tipo, $id_cur){

        if($tipo == 1 || $tipo == 2 || $tipo == 4){
            if($sql = $this->con->prepare("SELECT * FROM _jardinva_alumnos WHERE eliminado=? ORDER BY apellido_p")){
                if($sql->bind_param("i", $this->eliminado)){
                    if($sql->execute()){
                        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
        if($tipo == 3){

            if($sql = $this->con->prepare("SELECT * FROM _jardinva_cursos WHERE id_cur=? AND eliminado=?")){
                if($sql->bind_param("ii", $id_cur, $this->eliminado)){
                    if($sql->execute()){
                        $prnt_id = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0]['parent_id'];
                        if($prnt_id > 0){
                            if($sql = $this->con->prepare("SELECT * FROM _jardinva_alumnos WHERE (id_cur=? OR id_cur=?) AND eliminado=? ORDER BY apellido_p")){
                                if($sql->bind_param("iii", $id_cur, $prnt_id, $this->eliminado)){
                                    if($sql->execute()){
                                        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
                                    }else{ echo htmlspecialchars($sql->error); }
                                }else{ echo htmlspecialchars($sql->error); }
                            }else{ echo htmlspecialchars($this->con->error); }
                        }else{
                            if($sql = $this->con->prepare("SELECT * FROM _jardinva_alumnos WHERE id_cur=? AND eliminado=? ORDER BY apellido_p")){
                                if($sql->bind_param("ii", $id_cur, $this->eliminado)){
                                    if($sql->execute()){
                                        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
                                    }else{ echo htmlspecialchars($sql->error); }
                                }else{ echo htmlspecialchars($sql->error); }
                            }else{ echo htmlspecialchars($this->con->error); }
                        }
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }

        }

    }
}