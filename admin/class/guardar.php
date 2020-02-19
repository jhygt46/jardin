<?php
session_start();

require_once $path_.'/mysql_class.php';

class Guardar{
    
    public $con = null;
    public $id_page = null;
    
    public function __construct(){
        $this->con = new Conexion();
	if(!isset($_SESSION['user']['info']['id_user'])){ exit; }
    }

    public function process(){
        
        
        // CRAER //
        if($_POST['accion'] == "crearusuarios"){
            return $this->crearusuarios();
        }
        // IMAGEN //
        if($_POST['accion'] == "ingresarimagen"){
            return $this->ingresarimagen();
        }

        // ELIMINAR //
        if($_POST['accion'] == "eliminarusuarios"){
            return $this->eliminarusuarios();
        }
        if($_POST['accion'] == "eliminarimage"){
            return $this->eliminarimage();
        }
        
        if($_POST['accion'] == "_jardinva_crearalumnos"){
            return $this->_jardinva_crearalumnos();
        }
        if($_POST['accion'] == "_jardinva_crearcurso"){
            return $this->_jardinva_crearcurso();
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
        if($_POST['accion'] == "_jardinva_crearboleta"){
            return $this->_jardinva_crearboleta();
        }
	if($_POST['accion'] == "_jardinva_eliminarprestamo"){
            return $this->_jardinva_eliminarprestamo();
        }
        
    }
    

    

    private function ingresarimagen(){
        
        $foto = $this->subirfoto();

        if($_POST["db"] == "tour"){
            $db_name = "_jardinva_tour";
            $id = "id_tour";
        }
        
	$info['foto'] = $foto;
        $info['op'] = 2;
        $info['mensaje'] = "Error al subir la imagen";
        
        if($foto['op'] == 1 && isset($db_name)){
            
            $info = $this->con->sql("SELECT * FROM ".$db_name." WHERE ".$id."='".$_POST["id"]."'");
            $images = json_decode($info['resultado'][0]['images']);
            $images[] = $foto['name'];
            $info['images'] = $images;
            
            $this->con->sql("UPDATE ".$db_name." SET images='".json_encode($images)."' WHERE  ".$id."='".$_POST["id"]."'");
            
            $info['op'] = 1;
            $info['mensaje'] = "Imagen subida";
            $info['reload'] = 1;
            $info['page'] = "asignar_imagen.php?db=".$_POST["db"]."&id=".$_POST["id"];
            
            
        }  
            
        return $info;
        
        
    }

    private function subirfoto(){
        
        $file_formats = array("jpg", "png", "gif");
	$filepath = "/var/www/html/virtual/jardinvalleencantado.cl/www/admin/images/uploads/1/";
        
        $name = $_FILES['file_image0']['name']; // filename to get file's extension
        $size = $_FILES['file_image0']['size'];
        
        if (strlen($name)){
            $ext = end(explode(".", $name));
            if (in_array($ext, $file_formats)) { // check it if it's a valid format or not
                if ($size < (2048 * 1024)) { // check it if it's bigger than 2 mb or no
                    $imagename = md5(uniqid() . time()) . "." . $ext;
                    $tmp = $_FILES['file_image0']['tmp_name'];
                    if (move_uploaded_file($tmp, $filepath . $imagename)){
                        $info['op'] = 1;
                        $info['mensaje'] = "Imagen subida";
                        $info['name'] = $imagename;
                    } else {
                        $info['op'] = 2;
                        $info['mensaje'] = "No se pudo subir la imagen";
			$info['tmp'] = $tmp;
			$info['filepath'] = $filepath;
			$info['imagename'] = $imagename;
                    }
                } else {
                    $info['op'] = 2;
                    $info['mensaje'] = "Imagen sobrepasa los 2MB establecidos";
                }
            } else {
                $info['op'] = 2;
                $info['mensaje'] = "Formato Invalido";
            }
        } else {
            $info['op'] = 2;
            $info['mensaje'] =  "No ha seleccionado una imagen";
        }
        return $info;
    }
    private function crearusuarios(){
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
	$password = $_POST['pass'];
	$tipo = $_POST['tipo'];
	$perm_ingreso = $_POST['perm_ingreso'];
	$perm_edicion = $_POST['perm_edicion'];
	$perm_prestamo = $_POST['perm_prestamo'];
	$perm_devolucion = $_POST['perm_devolucion'];

	if($id > 0){
            $this->con->sql("UPDATE usuarios SET nombre='".$nombre."', correo='".$correo."', tipo='".$tipo."', perm_ingreso='".$perm_ingreso."', perm_edicion='".$perm_edicion."', perm_prestamo='".$perm_prestamo."', perm_devolucion='".$perm_devolucion."' WHERE id_user='".$id."'");
            $info['op'] = 1;
            $info['mensaje'] = "Usuario modificada exitosamente";
        }
        if($id == 0){
            $sql_insert = $this->con->sql("INSERT INTO usuarios (nombre, correo, fecha_creado, tipo, perm_ingreso, perm_edicion, perm_prestamo, perm_devolucion) VALUES ('".$nombre."', '".$correo."', now(), '".$tipo."', '".$perm_ingreso."', '".$perm_edicion."', '".$perm_prestamo."', '".$perm_devolucion."')");
            $id = $sql_insert['insert_id'];
	    $info['op'] = 1;
            $info['mensaje'] = "Usuario ingresado exitosamente";
        }
        
	if($password != ""){
		$this->con->sql("UPDATE usuarios SET pass='".md5($password)."' WHERE id_user='".$id."'");
	}

        $info['reload'] = 1;
        $info['page'] = "crear_usuario.php";
        return $info;
        
    }
    private function _jardinva_crearalumnos(){
        
        /*
        if($this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        $id = $_POST['id'];
        
        $nmatricula = $_POST['nmatricula'];
        $rut = $_POST['rut'];
        $apellido_p = $_POST['apellido_p'];
        $apellido_m = $_POST['apellido_m'];
        $nombres = $_POST['nombres'];
        $sexo = $_POST['sexo'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $fecha_matricula = $_POST['fecha_matricula'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $direccion = $_POST['direccion'];
        $nombre_apoderado = $_POST['nombre_apoderado'];
        $telefono_apoderado = $_POST['telefono_apoderado'];
        $email_apoderado = $_POST['email_apoderado'];
        $fecha_retiro = $_POST['fecha_retiro'];
        $motivo_retiro = $_POST['motivo_retiro'];
        $observaciones = $_POST['observaciones'];
        $curso = $_POST['curso'];
	    $rr = $_POST['rr'];
        
        $nombre_01 = $_POST['nombre_01'];
        $nombre_02 = $_POST['nombre_02'];
        
        $celular_01 = $_POST['celular_01'];
        $celular_02 = $_POST['celular_02'];
        
        $email_01 = $_POST['email_01'];
        $email_02 = $_POST['email_02'];
        
        if($id == 0){
            
            $a = $this->con->sql("INSERT INTO _jardinva_alumnos (rut) VALUES ('1')");
            $id = $a['insert_id'];
            $info['op'] = 1;
            $info['mensaje'] = "Alumno ingresado exitosamente";
            
        }
        if($id > 0){
            
            $this->con->sql("UPDATE _jardinva_alumnos SET nmatricula='".$nmatricula."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET rut='".$rut."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET apellido_p='".$apellido_p."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET apellido_m='".$apellido_m."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET nombres='".$nombres."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET sexo='".$sexo."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET fecha_nacimiento='".$fecha_nacimiento."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET fecha_matricula='".$fecha_matricula."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET fecha_ingreso='".$fecha_ingreso."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET direccion='".$direccion."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET nombre_apoderado='".$nombre_apoderado."' WHERE id_alu='".$id."'");
	        $this->con->sql("UPDATE _jardinva_alumnos SET rut='".$rut."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET telefono_apoderado='".$telefono_apoderado."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET email_apoderado='".$email_apoderado."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET fecha_retiro='".$fecha_retiro."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET motivo_retiro='".$motivo_retiro."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET observaciones='".$observaciones."' WHERE id_alu='".$id."'");
            
            $this->con->sql("UPDATE _jardinva_alumnos SET id_cur='".$curso."' WHERE id_alu='".$id."'");
	        $this->con->sql("UPDATE _jardinva_alumnos SET rr='".$rr."' WHERE id_alu='".$id."'");
            
            $this->con->sql("UPDATE _jardinva_alumnos SET nombre_01='".$nombre_01."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET nombre_02='".$nombre_02."' WHERE id_alu='".$id."'");
            
            $this->con->sql("UPDATE _jardinva_alumnos SET celular_01='".$celular_01."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET celular_02='".$celular_02."' WHERE id_alu='".$id."'");
            
            $this->con->sql("UPDATE _jardinva_alumnos SET email_01='".$email_01."' WHERE id_alu='".$id."'");
            $this->con->sql("UPDATE _jardinva_alumnos SET email_02='".$email_02."' WHERE id_alu='".$id."'");
            
            $info['op'] = 1;
            $info['mensaje'] = "Alumno modificado exitosamente";
            
        }
                
        $info['reload'] = 1;
        $info['page'] = "_jardinva_info_alumnos.php";
        return $info;
        
    }
    private function _jardinva_crearboleta(){
        
        /*
        if($this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        
        $id = $_POST['id'];
        
        $nula = $_POST['nula'];
        $tipo = 1;
        $numero = $_POST['nboleta'];
        
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        
        $matricula = $_POST['matricula'];
        
        if($id == 0){
            $a = $this->con->sql("INSERT INTO _jardinva_boletas (numero, dia, mes, ano, tipo, nula, matricula) VALUES ('".$numero."', '".$dia."', '".$mes."', '".$ano."', '".$tipo."', '".$nula."', '".$matricula."')");
            $info['db'] = $a;
            $info['op'] = 1;
            $info['mensaje'] = "Boleta ingresado exitosamente";
        }
        if($id > 0){
            $a = $this->con->sql("UPDATE _jardinva_boletas SET numero='".$numero."', dia='".$dia."', mes='".$mes."', ano='".$ano."', tipo='".$tipo."', nula='".$nula."', matricula='".$matricula."', mjardin='".$mjardin."', msalacuna='".$msalacuna."' WHERE id_bol='".$id."'");
            $info['db'] = $a;
            $info['op'] = 1;
            $info['mensaje'] = "Boleta modificado exitosamente";
        }
                
        $info['reload'] = 1;
        $info['page'] = "_jardinva_crear_boletas.php?mes=".$mes."&ano=".$ano."&dia=".$dia;
        return $info;
        
    }
    private function _jardinva_crearcurso(){
        
        /*
        if($this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        
        if($id == 0){
            $a = $this->con->sql("INSERT INTO _jardinva_cursos (nombre) VALUES ('".$nombre."')");
            $info['db'] = $a;
            $info['op'] = 1;
            $info['mensaje'] = "Curso ingresado exitosamente";
        }
        if($id > 0){
            $this->con->sql("UPDATE _jardinva_cursos SET nombre='".$nombre."' WHERE id_cur='".$id."'");
            $info['op'] = 1;
            $info['mensaje'] = "Curso modificado exitosamente";
        }
                
        $info['reload'] = 1;
        $info['page'] = "_jardinva_crear_cursos.php";
        return $info;
        
    }
    

    public function eliminarproducto(){
        
        if(!$this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        
        $id = $_POST['id'];
        $this->con->sql("UPDATE producto SET fecha_eliminado=now(), eliminado='1' WHERE id_pro='".$id."'");
        
        $info['tipo'] = "success";
        $info['titulo'] = "Eliminado";
        $info['texto'] = "Producto ".$_POST["nombre"]." Eliminado";
        $info['reload'] = 1;
        $info['page'] = "crear_producto.php";

        return $info;
        
    }
    public function eliminarusuarios(){
        
	$info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el usuario";

        /*
        if(!$this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        
        $id = $_POST['id'];
        $this->con->sql("DELETE FROM usuarios WHERE id_user='".$id."'");
        $info['tipo'] = "success";
        $info['titulo'] = "Eliminado";
        $info['texto'] = "Usuario ".$_POST["nombre"]." Eliminado";
        $info['reload'] = 1;
        $info['page'] = "crear_usuario.php";

        return $info;
        
    }
    public function eliminarimage(){
        
        /*
        if(!$this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        
        if($_SERVER['HTTP_HOST'] == "localhost"){
            $filepath = "C:/Appserv/www/admin/images/uploads/1/";
        }else{
            $filepath = "/var/www/html/jardinvalleencantado.cl/public_html/admin/images/uploads/1/";
        }
        
        $e = explode("/", $_POST["id"]);
        $db = $e[0];
        $id = $e[1];
        $pos = $e[2];
        
        if($db == "tour"){
            $db_name = "_jardinva_tour";
            $db_id = "id_tour";
        }
        
        $info_image = $this->con->sql("SELECT images FROM ".$db_name." WHERE ".$db_id."='".$id."'");
        $images = json_decode($info_image['resultado'][0]['images']);
        
        $file = $images[$pos];
        array_splice($images, $pos, 1);
        $this->con->sql("UPDATE ".$db_name." SET images='".json_encode($images)."' WHERE ".$db_id."='".$id."'");
        
        if(file_exists($filepath.$file)){
            unlink($filepath.$file);
        }
        
        $info['tipo'] = "success";
        $info['titulo'] = "Eliminado";
        $info['texto'] = "Imagen Eliminada";
        $info['reload'] = 1;
        $info['page'] = "asignar_imagen.php?db=".$db."&id=".$id;

        return $info;
        
    }
    public function _jardinva_eliminarprestamo(){

	$info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el prestamo";

	/*
        if(!$this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        
        $id = $_POST['id'];
        $prestamo = $this->con->sql("SELECT id_lib FROM _jardinva_prestamos WHERE id_pre='".$id."'");
	if($prestamo['estado'] == true){
		if($prestamo['count'] == 1){

			$this->con->sql("DELETE FROM _jardinva_prestamos WHERE id_pre='".$id."'");
			$this->con->sql("DELETE FROM _jardinva_libros WHERE id_lib='".$prestamo['resultado'][0]['id_lib']."'");

			$info['tipo'] = "success";
        		$info['titulo'] = "Eliminado";
        		$info['texto'] = "Prestamo Eliminado";
        		$info['reload'] = 1;
        		$info['page'] = "_jardinva_prestamos.php";
		}
	}
	
        return $info;

    }
    public function _jardinva_eliminaralumnos(){
        
	$info['op'] = 2;
        $info['mensaje'] = "No se pudo borrar el alumno";

        /*
        if(!$this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        
        $id = $_POST['id'];
        $this->con->sql("UPDATE _jardinva_alumnos SET eliminado='1' WHERE id_alu='".$id."'");
        $info['tipo'] = "success";
        $info['titulo'] = "Eliminado";
        $info['texto'] = "Alumno ".$_POST["nombre"]." Eliminado";
        $info['reload'] = 1;
        $info['page'] = "_jardinva_info_alumnos.php";

        return $info;
        
    }

    public function _jardinva_eliminarcurso(){
        
        /*
        if(!$this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        
        $id = $_POST['id'];
        $this->con->sql("UPDATE _jardinva_cursos SET eliminado='1' WHERE id_cur='".$id."'");
        $info['tipo'] = "success";
        $info['titulo'] = "Eliminado";
        $info['texto'] = "Curso ".$_POST["nombre"]." Eliminado";
        $info['reload'] = 1;
        $info['page'] = "_jardinva_crear_cursos.php";

        return $info;
        
    }
    public function _jardinva_eliminarboleta(){
        
        /*
        if(!$this->seguridad(1)){
            $info['op'] = 2;
            $info['mensaje'] = "No tiene los permisos para ejecutar esta Tarea";
            return $info;
        }
        */
        $id = $_POST['id'];
        $that = $this->con->sql("SELECT * FROM _jardinva_boletas WHERE id_bol='".$id."'");
        $this->con->sql("UPDATE _jardinva_boletas SET eliminado='1' WHERE id_bol='".$id."'");
        
        $info['tipo'] = "success";
        $info['titulo'] = "Eliminado";
        $info['texto'] = "Curso ".$_POST["nombre"]." Eliminado";
        $info['reload'] = 1;
        $info['page'] = "_jardinva_crear_boletas.php?ano=".$that['resultado'][0]['ano']."&mes=".$that['resultado'][0]['mes']."&dia=".$that['resultado'][0]['dia'];

        return $info;
        
    }

}
