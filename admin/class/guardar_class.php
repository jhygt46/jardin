<?php
session_start();

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."jardin/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."jardin/");
}

require_once DIR."db.php";
require_once DIR_BASE."config/config.php";

class Guardar{
    
    public $con = null;
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

        $this->con = new mysqli($this->host[0], $this->usuario[0], $this->password[0], $db_database[0]);

    }

    public function process(){

        if($_POST['accion'] == "crearusuarios"){
            return $this->crearusuarios();
        }
        if($_POST['accion'] == "_jardinva_crearalumnos"){
            return $this->_jardinva_crearalumnos();
        }
        if($_POST['accion'] == "_jardinva_crearcurso"){
            return $this->_jardinva_crearcurso();
        }
        if($_POST['accion'] == "_jardinva_crearboleta"){
            return $this->_jardinva_crearboleta();
        }
        if($_POST['accion'] == "_jardinva_crearcampana"){
            return $this->_jardinva_crearcampana();
        }
        if($_POST['accion'] == "_jardinva_eliminarcurso"){
            return $this->_jardinva_eliminarcurso();
        }
        if($_POST['accion'] == "_jardinva_eliminarboleta"){
            return $this->_jardinva_eliminarboleta();
        }
        if($_POST['accion'] == "_jardinva_eliminaralumnos"){
            return $this->_jardinva_eliminaralumnos();
        }
	    if($_POST['accion'] == "_jardinva_eliminarprestamo"){
            return $this->_jardinva_eliminarprestamo();
        }
        if($_POST['accion'] == "eliminarmaterial"){
            return $this->eliminarmaterial();
        }
        if($_POST['accion'] == "eliminarusuarios"){
            return $this->eliminarusuarios();
        }
        
    }
    private function crearusuarios(){
        
        $info['op'] = 2;
        $info['mensaje'] = "Usuario no se pudo guardar";
        
        $tipo = 1;
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $password = $_POST['pass'];
        $perm_ingreso = $_POST['perm_ingreso'];
        $perm_edicion = $_POST['perm_edicion'];
        $perm_prestamo = $_POST['perm_prestamo'];
        $perm_devolucion = $_POST['perm_devolucion'];

        $id = $_POST['id'];

        if($id > 0){
            if($sql = $this->con->prepare("UPDATE usuarios SET nombre=?, correo=?, tipo=?, perm_ingreso=?, perm_edicion=?, perm_prestamo=?, perm_devolucion=? WHERE id_user=?")){
                if($sql->bind_param("ssiiiiii", $nombre, $correo, $tipo, $perm_ingreso, $perm_edicion, $perm_prestamo, $perm_devolucion, $id)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Usuario modificada exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }

        if($id == 0){
            $s = '';
            $e = 0;
            if($sql = $this->con->prepare("INSERT INTO usuarios (nombre, correo, pass, code_cookie, fecha_creado, tipo, perm_ingreso, perm_edicion, perm_prestamo, perm_devolucion, eliminado) VALUES (?, ?, ?, ?, now(), ?, ?, ?, ?, ?, ?)")){
                if($sql->bind_param("ssssiiiiii", $nombre, $correo, $s, $s, $tipo, $perm_ingreso, $perm_edicion, $perm_prestamo, $perm_devolucion, $e)){
                    if($sql->execute()){
                        $id = $this->con->insert_id;
                        $info['op'] = 1;
                        $info['mensaje'] = "Usuario ingresado exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }

        if($password != ""){
            $pass = md5($password);
            if($sql = $this->con->prepare("UPDATE usuarios SET pass=? WHERE id_user=?")){
                if($sql->bind_param("si", $pass, $id)){
                    if($sql->execute()){
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }

        $info['reload'] = 1;
        $info['page'] = "crear_usuario.php";
        return $info;

    }
    private function _jardinva_crearalumnos(){
        
        $info['op'] = 2;
        $info['mensaje'] = "Alumno no se pudo guardar";

        $nmatricula = $_POST['nmatricula'];
        $rut = $_POST['rut'];
        $apellido_p = $_POST['apellido_p'];
        $apellido_m = $_POST['apellido_m'];
        $nombres = $_POST['nombres'];
        $sexo = $_POST['sexo'];
        $fecha_nacimiento = ($_POST['fecha_nacimiento'] == '') ? '0000-00-00' : $_POST['fecha_nacimiento'] ;
        $fecha_matricula = ($_POST['fecha_matricula'] == '') ? '0000-00-00' : $_POST['fecha_matricula'] ;
        $fecha_ingreso = ($_POST['fecha_ingreso'] == '') ? '0000-00-00' : $_POST['fecha_ingreso'] ;
        $direccion = $_POST['direccion'];
        $nombre_apoderado = $_POST['nombre_apoderado'];
        $telefono_apoderado = $_POST['telefono_apoderado'];
        $email_apoderado = $_POST['email_apoderado'];
        $fecha_retiro = ($_POST['fecha_retiro'] == '') ? '0000-00-00' : $_POST['fecha_retiro'] ;
        $motivo_retiro = $_POST['motivo_retiro'];
        $observaciones = $_POST['observaciones'];
        $curso = $_POST['curso'];
	    $rr = $_POST['rr'];
        
        $nombre_01 = $_POST['nombre_01'];
        $celular_01 = $_POST['celular_01'];
        $email_01 = $_POST['email_01'];
        $nombre_02 = $_POST['nombre_02'];
        $celular_02 = $_POST['celular_02'];
        $email_02 = $_POST['email_02'];
        
        $id = $_POST['id'];

        if($id > 0){
            if($sql = $this->con->prepare("UPDATE _jardinva_alumnos SET nmatricula=?, rut=?, apellido_p=?, apellido_m=?, nombres=?, sexo=?, fecha_nacimiento=?, fecha_matricula=?, fecha_ingreso=?, direccion=?, nombre_apoderado=?, telefono_apoderado=?, email_apoderado=?, fecha_retiro=?, motivo_retiro=?, observaciones=?, id_cur=?, rr=?, nombre_01=?, nombre_02=?, celular_01=?, celular_02=?, email_01=?, email_02=? WHERE id_alu=?")){
                if($sql->bind_param("issssissssssssssiissssssi", $nmatricula, $rut, $apellido_p, $apellido_m, $nombres, $sexo, $fecha_nacimiento, $fecha_matricula, $fecha_ingreso, $direccion, $nombre_apoderado, $telefono_apoderado, $email_apoderado, $fecha_retiro, $motivo_retiro, $observaciones, $curso, $rr, $nombre_01, $nombre_02, $celular_01, $celular_02, $email_01, $email_02, $id)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Alumno modificada exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
        if($id == 0){
            $e = 0;
            if($sql = $this->con->prepare("INSERT INTO _jardinva_alumnos (nmatricula, rut, apellido_p, apellido_m, nombres, sexo, fecha_nacimiento, fecha_matricula, fecha_creado, fecha_ingreso, direccion, nombre_apoderado, telefono_apoderado, email_apoderado, fecha_retiro, motivo_retiro, observaciones, id_cur, rr, nombre_01, nombre_02, celular_01, celular_02, email_01, email_02, orders, eliminado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")){
                if($sql->bind_param("issssissssssssssiissssssii", $nmatricula, $rut, $apellido_p, $apellido_m, $nombres, $sexo, $fecha_nacimiento, $fecha_matricula, $fecha_ingreso, $direccion, $nombre_apoderado, $telefono_apoderado, $email_apoderado, $fecha_retiro, $motivo_retiro, $observaciones, $curso, $rr, $nombre_01, $nombre_02, $celular_01, $celular_02, $email_01, $email_02, $e, $e)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Alumno ingresado exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
                
        $info['reload'] = 1;
        $info['page'] = "_jardinva_info_alumnos.php";
        return $info;
        
    }
    private function _jardinva_crearboleta(){

        $info['op'] = 2;
        $info['mensaje'] = "Boleta no se pudo guardar";

        $tipo = 1;
        $nula = $_POST['nula'];
        $numero = $_POST['nboleta'];
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $matricula = $_POST['matricula'];
        
        $id = $_POST['id'];

        if($id == 0){
            $e = 0;
            if($sql = $this->con->prepare("INSERT INTO _jardinva_boletas (numero, dia, mes, ano, tipo, nula, matricula, mjardin, msalacuna, eliminado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")){
                if($sql->bind_param("iiiiiiiiii", $numero, $dia, $mes, $ano, $tipo, $nula, $matricula, $e, $e, $e)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Boleta ingresado exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }

        if($id > 0){
            if($sql = $this->con->prepare("UPDATE _jardinva_boletas SET numero=?, dia=?, mes=?, ano=?, tipo=?, nula=?, matricula=? WHERE id_bol=?")){
                if($sql->bind_param("iiiiiiii", $numero, $dia, $mes, $ano, $tipo, $nula, $matricula, $id)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Boleta modificado exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
                
        $info['reload'] = 1;
        $info['page'] = "_jardinva_crear_boletas.php?mes=".$mes."&ano=".$ano."&dia=".$dia;
        return $info;
        
    }
    
    private function _jardinva_crearcampana(){
        
        $info['op'] = 2;
        $info['mensaje'] = "Campa&ntilde;a no se pudo crear";

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $asunto = $_POST['asunto'];
        $template = $_POST['template'];

        if($id > 0){
            if($sql = $this->con->prepare("UPDATE _jardinva_campanas SET nombre=?, asunto=?, template=? WHERE id_cam=?")){
                if($sql->bind_param("sssi", $nombre, $asunto, $template, $id)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Campa&ntilde;a modificada exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
        if($id == 0){
            if($sql = $this->con->prepare("INSERT INTO _jardinva_campanas (nombre, asunto, template) VALUES (?, ?, ?)")){
                if($sql->bind_param("sss", $nombre, $asunto, $template)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Campa&ntilde;a ingresada exitosamente";
                        $id = $this->con->insert_id;
                        $this->usuarios_campana($id);
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
                
        $info['reload'] = 1;
        $info['page'] = "_jardinva_crear_campana.php";
        return $info;
        
    }
    private function _jardinva_crearcurso(){
        
        $info['op'] = 2;
        $info['mensaje'] = "Curso no se pudo crear";

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        if($id == 0){
            $e = 0;
            if($sql = $this->con->prepare("INSERT INTO _jardinva_cursos (nombre, parent_id, orders, eliminado) VALUES (?, ?, ?, ?)")){
                if($sql->bind_param("siii", $nombre, $e, $e, $e)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Curso ingresado exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }

        if($id > 0){
            if($sql = $this->con->prepare("UPDATE _jardinva_cursos SET nombre=? WHERE id_cur=?")){
                if($sql->bind_param("si", $nombre, $id)){
                    if($sql->execute()){
                        $info['op'] = 1;
                        $info['mensaje'] = "Curso modificado exitosamente";
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        }
                
        $info['reload'] = 1;
        $info['page'] = "_jardinva_crear_cursos.php";
        return $info;
        
    }
    public function eliminarusuarios(){
        
	    $info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el usuario";
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        if($sql = $this->con->prepare("UPDATE usuarios SET eliminado='1' WHERE id_user=?")){
            if($sql->bind_param("i", $id)){
                if($sql->execute()){
                    $info['op'] = 1;
                    $info['mensaje'] = "Curso modificado exitosamente";
                    $info['tipo'] = "success";
                    $info['titulo'] = "Eliminado";
                    $info['texto'] = "Usuario ".$nombre." Eliminado";
                    $info['reload'] = 1;
                    $info['page'] = "crear_usuario.php";
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

        return $info;
        
    }
    public function _jardinva_eliminarprestamo(){

	    $info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el prestamo";
        
        $id = $_POST['id'];
        if($sql = $this->con->prepare("SELECT id_lib FROM _jardinva_prestamos WHERE id_pre=?")){
            if($sql->bind_param("i", $id)){
                if($sql->execute()){

                    $res = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];

                    if($sql = $this->con->prepare("DELETE FROM _jardinva_prestamos WHERE id_pre=?")){
                        if($sql->bind_param("i", $id)){
                            if($sql->execute()){
                                
                            }else{ echo htmlspecialchars($sql->error); }
                        }else{ echo htmlspecialchars($sql->error); }
                    }else{ echo htmlspecialchars($this->con->error); }

                    if($sql = $this->con->prepare("DELETE FROM _jardinva_libros WHERE id_lib=?")){
                        if($sql->bind_param("i", $res["id_lib"])){
                            if($sql->execute()){
                                
                            }else{ echo htmlspecialchars($sql->error); }
                        }else{ echo htmlspecialchars($sql->error); }
                    }else{ echo htmlspecialchars($this->con->error); }

                    $info['tipo'] = "success";
                    $info['titulo'] = "Eliminado";
                    $info['texto'] = "Prestamo Eliminado";
                    $info['reload'] = 1;
                    $info['page'] = "_jardinva_prestamos.php";

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }
	
        return $info;

    }
    public function _jardinva_eliminaralumnos(){
        
	    $info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el alumno";

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        if($sql = $this->con->prepare("UPDATE _jardinva_alumnos SET eliminado='1' WHERE id_alu=?")){
            if($sql->bind_param("i", $id)){
                if($sql->execute()){
                    $info['op'] = 1;
                    $info['mensaje'] = "Curso modificado exitosamente";
                    $info['tipo'] = "success";
                    $info['titulo'] = "Eliminado";
                    $info['texto'] = "Alumno ".$nombre." Eliminado";
                    $info['reload'] = 1;
                    $info['page'] = "_jardinva_info_alumnos.php";
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

        return $info;
        
    }
    public function _jardinva_eliminarcurso(){
        
        $info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el curso";

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        if($sql = $this->con->prepare("UPDATE _jardinva_cursos SET eliminado='1' WHERE id_cur=?")){
            if($sql->bind_param("i", $id)){
                if($sql->execute()){
                    $info['op'] = 1;
                    $info['mensaje'] = "Curso modificado exitosamente";
                    $info['tipo'] = "success";
                    $info['titulo'] = "Eliminado";
                    $info['texto'] = "Curso ".$_POST["nombre"]." Eliminado";
                    $info['reload'] = 1;
                    $info['page'] = "_jardinva_crear_cursos.php";
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }


        return $info;
        
    }
    public function _jardinva_eliminarboleta(){

        $info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el curso";

        $id = $_POST['id'];
        $nombre = explode("##", $_POST['nombre']);

        if($sql = $this->con->prepare("UPDATE _jardinva_boletas SET eliminado='1' WHERE id_bol=?")){
            if($sql->bind_param("i", $id)){
                if($sql->execute()){
                    $info['op'] = 1;
                    $info['mensaje'] = "Curso modificado exitosamente";
                    $info['tipo'] = "success";
                    $info['titulo'] = "Eliminado";
                    $info['texto'] = "Curso ".$nombre[0]." Eliminado";
                    $info['reload'] = 1;
                    $info['page'] = "_jardinva_crear_boletas.php?ano=".$nombre[1]."&mes=".$nombre[2]."&dia=".$nombre[3];
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }        

        return $info;
        
    }

}
