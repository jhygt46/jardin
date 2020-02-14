<?php

require '/var/www/html/virtual/jardinvalleencantado.cl/www/admin/class/mysql_class.php';

class Libro{
    
    	public $con = null;

    	public function __construct(){
        
		$this->con = new Conexion();

    	}
    	public function nuevo_libro(){

		$info["op"] = 2;
		$usr = $this->get_user();
		
		if($usr["user"] == 1){
			$id_lib = $_POST["id_lib"];
			$nombre = $_POST["nombre"];
			if($id_lib == 0 && $usr["perm_ingreso"] == 1){
				$qr = $_POST["qr"];
				$sql = $this->con->sql("INSERT INTO _jardinva_libros (nombre, qr) VALUES ('".$nombre."', '".$qr."')");
				if($sql["estado"] == true){
					$info["op"] = 1;
				}
			}
			if($id_lib > 0 && $usr["perm_edicion"] == 1){
				$sql = $this->con->sql("UPDATE _jardinva_libros SET nombre='".$nombre."' WHERE id_lib='".$id_lib."'");
				if($sql["estado"] == true){
					$info["op"] = 1;
				}
			}
		}
		return $info;

	}
	private function enviar_correo($correo, $nombre, $libro, $fecha, $tipo){

		$send['code'] = 'k8Dqa2C9lKgxT6kpNs1z6RgKb0r3WaCvN6RjK7rU';
		$send['nombre'] = $nombre;
		$send['libro'] = $libro;
		$send['fecha'] = $fecha;
		$send['tipo'] = $tipo;
		$send['correo'] = $correo;

		$ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://www.izusushi.cl/mail_jardin');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send));
                if(!curl_errno($ch)){
			$resp_email = json_decode(curl_exec($ch));
			curl_close($ch);
                        if($resp_email->{'op'} != 1){
                                // ALERTAR ERROR //
                        }
		}

	}
	public function sin_bolsa(){

		$info["op"] = 2;
		$usr = $this->get_user();
		
		if($usr["user"] == 1){
			if($usr["perm_prestamo"] == 1){
				$id_alu = $_POST["id_alu"];
				$sql_alumnos = $this->con->sql("SELECT nombres, apellido_p, apellido_m, email_01, email_02 FROM _jardinva_alumnos WHERE id_alu='".$id_alu."'");
				if($sql_alumnos["count"] == 1){
						$data_alumno = $sql_alumnos["resultado"][0];
						$nombre = $data_alumno["nombres"]." ".$data_alumno["apellido_p"]{0}.". ".$data_alumno["apellido_m"]{0}.".";
						$fecha = $this->get_date(time());
						$data_alumno['email_01'] = "valle-encantado@hotmail.com";
						if(filter_var($data_alumno['email_01'], FILTER_VALIDATE_EMAIL)){
							$this->enviar_correo($data_alumno['email_01'], $nombre, '', $fecha, 4);
						}
						if(filter_var($data_alumno['email_01'], FILTER_VALIDATE_EMAIL)){
							//$this->enviar_correo($data_alumno['email_02'], $nombre, '', $fecha, 4);
						}
						$info["op"] = 1;
				}
			}
		}

	}
	public function prestar_libro(){

		$info["op"] = 2;
		$usr = $this->get_user();
		
		if($usr["user"] == 1){
			if($usr["perm_prestamo"] == 1){
				$id_lib = $_POST["id_lib"];
				$id_alu = $_POST["id_alu"];
				$estado = $_POST["estado"];
				$comentario = $_POST["comentario"];
				$sql = $this->con->sql("INSERT INTO _jardinva_prestamos (id_lib, id_alu, fecha_presto, id_user_presto, estado, comentario) VALUES ('".$id_lib."', '".$id_alu."', now(), '".$usr["id_user"]."', '".$estado."', '".$comentario."')");
				if($sql["estado"] == true){

					$sql_alumnos = $this->con->sql("SELECT nombres, apellido_p, apellido_m, email_01, email_02 FROM _jardinva_alumnos WHERE id_alu='".$id_alu."'");
					$sql_libros = $this->con->sql("SELECT nombre FROM _jardinva_libros WHERE id_lib='".$id_lib."'");
					if($sql_alumnos["count"] == 1 && $sql_libros["count"] == 1){
						$data_alumno = $sql_alumnos["resultado"][0];
						$data_libro = $sql_libros["resultado"][0];
						$nombre = $data_alumno["nombres"]." ".$data_alumno["apellido_p"]{0}.". ".$data_alumno["apellido_m"]{0}.".";
						$fecha = $this->get_date(time());
						$data_alumno['email_01'] = "valle-encantado@hotmail.com";
						if(filter_var($data_alumno['email_01'], FILTER_VALIDATE_EMAIL)){
							$this->enviar_correo($data_alumno['email_01'], $nombre, $data_libro['nombre'], $fecha, 1);
						}
						if(filter_var($data_alumno['email_01'], FILTER_VALIDATE_EMAIL)){
							//$this->enviar_correo($data_alumno['email_02'], $nombre, $data_libro['nombre'], $fecha, 1);
						}
						$info["op"] = 1;
					}

				}
			}
		}
		
		return $info;	

	}
	public function devolver_libro(){

		$info["op"] = 2;
		$usr = $this->get_user();
		
		if($usr["user"] == 1){
			$id_lib = $_POST["id_lib"];
			$sql_prestamos = $this->con->sql("SELECT * FROM _jardinva_prestamos WHERE id_lib='".$id_lib."' AND id_user_devolvio='0' AND fecha_devolvio='0000-00-00 00:00:00'");
			if($sql_prestamos["count"] == 1 && ($usr["perm_prestamo"] == 2 || ($usr["perm_prestamo"] == 1 && $usr["id_user"] == $sql_prestamos["resultado"][0]["id_user_presto"]))){
				$sql = $this->con->sql("UPDATE _jardinva_prestamos SET fecha_devolvio=now(), id_user_devolvio='".$usr["id_user"]."' WHERE id_pre='".$sql_prestamos["resultado"][0]["id_pre"]."'");
				if($sql["estado"] == true){
					$info["op"] = 1;
				}
			}
		}
		return $info;
		
	}
	public function get_user(){

		$info["user"] = 0;
		if(isset($_COOKIE["uid"]) && isset($_COOKIE["hash"])){
			$sql_user = $this->con->sql("SELECT * FROM usuarios WHERE id_user='".$_COOKIE["uid"]."' AND code_cookie='".$_COOKIE["hash"]."' AND eliminado='0'");
			if($sql_user["count"] == 1){
				$info["user"] = 1;
				$info["id_user"] = $_COOKIE["uid"];
				$info["nombre"] = $sql_user['resultado'][0]['nombre'];
				$info["perm_ingreso"] = $sql_user['resultado'][0]['perm_ingreso'];
				$info["perm_existente"] = $sql_user['resultado'][0]['perm_existente'];
				$info["perm_prestamo"] = $sql_user['resultado'][0]['perm_prestamo'];
				$info["perm_devolucion"] = $sql_user['resultado'][0]['perm_devolucion'];
				$info["perm_historial"] = $sql_user['resultado'][0]['perm_historial'];
				$info["perm_edicion"] = $sql_user['resultado'][0]['perm_edicion'];
				$info["ultimos_alumnos"] = $this->ultimos_alumnos($info["id_user"]);
			}		
		}
		return $info;
	
	}
	
	private function ultimos_alumnos($id_user){

		$sql_prestamos_2 = $this->con->sql("SELECT id_alu FROM _jardinva_prestamos WHERE id_user_devolvio='0' OR fecha_devolvio='0000-00-00 00:00:00'");
		$sql_prestamos = $this->con->sql("SELECT t2.id_alu, t2.nombres, t2.apellido_p, t2.apellido_m FROM _jardinva_prestamos t1, _jardinva_alumnos t2 WHERE t1.id_user_presto='".$id_user."' AND t1.id_alu=t2.id_alu ORDER BY t1.id_pre DESC");
		
		$aux_alu = Array();
		if($sql_prestamos["count"] > 0){
			for($i=0; $i<$sql_prestamos["count"]; $i++){
				if(!in_array($sql_prestamos["resultado"][$i]["id_alu"], $aux_alu)){
					$aux_alu[] = $sql_prestamos["resultado"][$i]["id_alu"];
					$aux['id'] = $sql_prestamos["resultado"][$i]["id_alu"];
					$aux['nombre'] = $sql_prestamos['resultado'][$i]['nombres']." ".$sql_prestamos['resultado'][$i]['apellido_p']." ".$sql_prestamos['resultado'][$i]['apellido_m'];
					$aux['count'] = $this->get_prestados_user($sql_prestamos_2['resultado'], $aux['id']);
					$info[] = $aux;
					unset($aux);
					if(count($aux_alu) >= 10){
						return $info;
					}
				}
			}
			return $info;
		}else{
			return 0;
		}
		
	}
	public function get_libro(){

		$info["lib"] = 0;
		if(isset($_GET["id"])){
			$sql_libro = $this->con->sql("SELECT * FROM _jardinva_libros WHERE qr='".$_GET["id"]."' AND eliminado='0'");
			if($sql_libro['count'] == 1){
				$info["lib"] = 1;
				$info["id_lib"] = $sql_libro['resultado'][0]['id_lib'];
				$info["nombre"] = $sql_libro['resultado'][0]['nombre'];
				$info["codigo"] = $sql_libro['resultado'][0]['codigo'];
				$info["prestamos"] = $this->get_prestamos($sql_libro['resultado'][0]['id_lib']);
				$info["estado"] = $this->get_estado_libro($sql_libro['resultado'][0]['id_lib']);
			}
		}		
		return $info;

	}
	
	private function get_prestamos($id_lib){

		$sql_prestamos = $this->con->sql("SELECT t1.id_user_presto, t1.fecha_presto, t1.id_user_devolvio, t1.fecha_devolvio, t1.email, t1.estado, t1.comentario, t2.id_alu, t2.nombres, t2.apellido_p, t2.apellido_m FROM _jardinva_prestamos t1, _jardinva_alumnos t2 WHERE t1.id_lib='".$id_lib."' AND t1.id_alu=t2.id_alu");
		if($sql_prestamos["count"] > 0){
			return $sql_prestamos['resultado'];
		}else{
			return 0;
		}

	}
	private function get_estado_libro($id_lib){

		$info["prestado"] = 0;
		$sql_estado = $this->con->sql("SELECT * FROM _jardinva_prestamos t1, _jardinva_alumnos t2 WHERE t1.id_alu=t2.id_alu AND t1.id_lib='".$id_lib."' AND (t1.fecha_devolvio='0000-00-00 00:00:00' OR t1.id_user_devolvio='0')");
		if($sql_estado["count"] == 1){
			$info["prestado"] = 1;
			$info["id_user_presto"] = $sql_estado['resultado'][0]['id_user_presto'];
			$info["nombre"] = $sql_estado['resultado'][0]['nombres']." ".$sql_estado['resultado'][0]['apellido_p']{0}.". ".$sql_estado['resultado'][0]['apellido_m']{0}.".";
			$info["fecha_presto"] = $sql_estado['resultado'][0]['fecha_presto'];
		}
		return $info;

	}
	public function prestados_user($id_user){

		$sql_prestamos = $this->con->sql("SELECT t1.id_user_presto, t1.fecha_presto, t1.id_user_devolvio, t1.fecha_devolvio, t1.email, t1.estado, t1.comentario, t2.id_alu, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre, t3.codigo FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3 WHERE t1.id_user_presto='".$id_user."' AND t1.fecha_devolvio='0000-00-00 00:00:00' AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib");
		if($sql_prestamos["count"] > 0){
			return $sql_prestamos['resultado'];
		}else{
			return 0;
		}

	}
	private function get_prestados_user($prestados, $id_alu){
		$cont=0;
		for($i=0; $i<count($prestados); $i++){
			if($prestados[$i]['id_alu'] == $id_alu){
				$cont++;
			}
		}
		return $cont;
	}
	public function get_alumnos(){

		$sql_prestamos = $this->con->sql("SELECT id_alu FROM _jardinva_prestamos WHERE id_user_devolvio='0' OR fecha_devolvio='0000-00-00 00:00:00'");
		$sql_alumnos = $this->con->sql("SELECT id_alu, nombres, apellido_p, apellido_m FROM _jardinva_alumnos WHERE eliminado='0'");
		for($i=0; $i<$sql_alumnos["count"]; $i++){
			$aux['id'] = $sql_alumnos['resultado'][$i]['id_alu'];
			$aux['nombre'] = $sql_alumnos['resultado'][$i]['nombres']." ".$sql_alumnos['resultado'][$i]['apellido_p']." ".$sql_alumnos['resultado'][$i]['apellido_m'];
			$aux['count'] = $this->get_prestados_user($sql_prestamos['resultado'], $aux['id']);
			$data[] = $aux;
			unset($aux);
		}
		return $data;

	}
	public function libro_cron(){
		
		$sql_alumnos = $this->con->sql("SELECT t1.id_pre, t1.fecha_presto, t2.email_01, t2.email_02, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3  WHERE t1.email='0' AND t1.fecha_devolvio='0000-00-00 00:00:00' AND t1.id_user_devolvio='0' AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib");
		if($sql_alumnos["count"] > 0){
			for($i=0; $i<$sql_alumnos["count"]; $i++){
				$data_alumno = $sql_alumnos['resultado'][$i];
				$fecha = time() - strtotime($data_alumno['fecha_presto']);
				if($fecha > 43200){

					$nombre = $data_alumno["nombres"]." ".$data_alumno["apellido_p"]{0}.". ".$data_alumno["apellido_m"]{0}.".";
					$fecha_p = $this->get_date(time()+432000);
					if(filter_var($data_alumno['email_01'], FILTER_VALIDATE_EMAIL)){
						$data_alumno['email_01'] = "misitiodelivery@gmail.com";
						$this->enviar_correo($data_alumno['email_01'], $nombre, $data_alumno['nombre'], $fecha_p, 2);
					}
					if(filter_var($data_alumno['email_02'], FILTER_VALIDATE_EMAIL)){
						//$this->enviar_correo($data_alumno['email_02'], $nombre, $data_alumno['nombre'], $fecha_p, 2);
					}
					$this->con->sql("UPDATE _jardinva_prestamos SET email='1' WHERE id_pre='".$data_alumno['id_pre']."'");

				}
			}
		}
		
	}
	private function get_date($time){
		
		$mes = date("m", $time);
		$dia = intval(date("d", $time));
		$ano = date("Y", $time);

		if($mes == "01"){ $m = "enero"; }
		if($mes == "02"){ $m = "febrero"; }
		if($mes == "03"){ $m = "marzo"; }
		if($mes == "04"){ $m = "abril"; }
		if($mes == "05"){ $m = "mayo"; }
		if($mes == "06"){ $m = "junio"; }
		if($mes == "07"){ $m = "julio"; }
		if($mes == "08"){ $m = "agosto"; }
		if($mes == "09"){ $m = "septiembre"; }
		if($mes == "10"){ $m = "octubre"; }
		if($mes == "11"){ $m = "noviembre"; }
		if($mes == "12"){ $m = "diciembre"; }

		return $dia." de ".$m." de ".$ano;

	}
	
}