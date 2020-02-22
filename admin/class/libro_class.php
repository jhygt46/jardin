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

class Libro{
    
		public $con = null;
		public $host = null;
		public $usuario = null;
		public $password = null;
		public $base_datos = null;
		public $eliminado = 0;
		public $fecha_devolvio = "0000-00-00 00:00:00";

    	public function __construct(){
        
			global $db_host;
			global $db_user;
			global $db_password;
			global $db_database;

			$this->host	= $db_host;
			$this->usuario = $db_user;
			$this->password = $db_password;
			$this->base_datos = $db_database;

			$this->con = new mysqli($this->host[0], $this->usuario[0], $this->password[0]);

    	}
    	public function nuevo_libro(){

		$info["op"] = 2;
		$usr = $this->get_user();
		
		if($usr["user"] == 1){
			$id_lib = $_POST["id_lib"];
			$nombre = $_POST["nombre"];
			if($id_lib == 0 && $usr["perm_ingreso"] == 1){
				$qr = $_POST["qr"];

				if($sql = $this->con->prepare("INSERT INTO _jardinva_libros (nombre, qr) VALUES (?, ?)")){
					if($sql->bind_param("ss", $nombre, $qr)){
						if($sql->execute()){
							$info['op'] = 1;
						}else{ echo htmlspecialchars($sql->error); }
					}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($this->con->error); }

			}
			if($id_lib > 0 && $usr["perm_edicion"] == 1){
				if($sql = $this->con->prepare("UPDATE _jardinva_libros SET nombre=? WHERE id_lib=?")){
					if($sql->bind_param("si", $nombre, $id_lib)){
						if($sql->execute()){
							$info['op'] = 1;
						}else{ echo htmlspecialchars($sql->error); }
					}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($this->con->error); }
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

				if($sql = $this->con->prepare("SELECT nombres, apellido_p, apellido_m, email_01, email_02 FROM _jardinva_alumnos WHERE id_alu=? AND eliminado=?")){
					if($sql->bind_param("ii", $id_alu, $this->eliminado)){
						if($sql->execute()){
		
							$data_alumno = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
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
		
						}else{ echo htmlspecialchars($sql->error); }
					}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($this->con->error); }

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

				if($sql = $this->con->prepare("INSERT INTO _jardinva_prestamos (id_lib, id_alu, fecha_presto, id_user_presto) VALUES (?, ?, now(), ?)")){
				if($sql->bind_param("iii", $id_lib, $id_alu, $usr["id_user"])){
				if($sql->execute()){
					
					if($sqla = $this->con->prepare("SELECT * FROM _jardinva_alumnos WHERE eliminado=?")){
					if($sqla->bind_param("i", $this->eliminado)){
					if($sqla->execute()){
	
						$data_alumno = $sqla->get_result()->fetch_all(MYSQLI_ASSOC)[0];

						if($sqll = $this->con->prepare("SELECT * FROM _jardinva_alumnos WHERE eliminado=?")){
						if($sqll->bind_param("i", $this->eliminado)){
						if($sqll->execute()){
		
							$data_libro = $sqll->get_result()->fetch_all(MYSQLI_ASSOC)[0];
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

						}else{ echo htmlspecialchars($sqll->error); }
						}else{ echo htmlspecialchars($sqll->error); }
						}else{ echo htmlspecialchars($this->con->error); }
	
					}else{ echo htmlspecialchars($sqla->error); }
					}else{ echo htmlspecialchars($sqla->error); }
					}else{ echo htmlspecialchars($this->con->error); }

				}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($this->con->error); }

			}
		}
		
		return $info;	

	}
	public function devolver_libro(){

		$info["op"] = 2;
		$usr = $this->get_user();
		
		if($usr["user"] == 1){

			$id_lib = $_POST["id_lib"];
			if($sql = $this->con->prepare("SELECT * FROM _jardinva_prestamos WHERE id_lib=? AND id_user_devolvio='0' AND fecha_devolvio='0000-00-00 00:00:00'")){
				if($sql->bind_param("i", $id_lib)){
					if($sql->execute()){
	
						$prestamos = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
						if(count($prestamos) == 1 && ($usr["perm_prestamo"] == 2 || ($usr["perm_prestamo"] == 1 && $usr["id_user"] == $prestamos[0]["id_user_presto"]))){
							
							if($sqlx = $this->con->prepare("UPDATE _jardinva_prestamos SET fecha_devolvio=now(), id_user_devolvio=? WHERE id_pre=?")){
								if($sqlx->bind_param("ii", $usr["id_user"], $prestamos[0]["id_pre"])){
									if($sqlx->execute()){
										$info['op'] = 1;
									}else{ echo htmlspecialchars($sqlx->error); }
								}else{ echo htmlspecialchars($sqlx->error); }
							}else{ echo htmlspecialchars($this->con->error); }

						}
	
					}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($sql->error); }
			}else{ echo htmlspecialchars($this->con->error); }
			
		}
		return $info;
		
	}
	public function get_user(){

		$info["user"] = 0;
		if(isset($_COOKIE["uid"]) && isset($_COOKIE["hash"])){

			if($sql = $this->con->prepare("SELECT * FROM usuarios WHERE id_user=? AND code_cookie=? AND eliminado=?")){
				if($sql->bind_param("isi", $_COOKIE["uid"], $_COOKIE["hash"], $this->eliminado)){
					if($sql->execute()){
	
						$usuario = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
						$info["user"] = 1;
						$info["id_user"] = $_COOKIE["uid"];
						$info["nombre"] = $usuario['nombre'];
						$info["perm_ingreso"] = $usuario['perm_ingreso'];
						$info["perm_existente"] = $usuario['perm_existente'];
						$info["perm_prestamo"] = $usuario['perm_prestamo'];
						$info["perm_devolucion"] = $usuario['perm_devolucion'];
						$info["perm_historial"] = $usuario['perm_historial'];
						$info["perm_edicion"] = $usuario['perm_edicion'];
						$info["ultimos_alumnos"] = $this->ultimos_alumnos($info["id_user"]);
	
					}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($sql->error); }
			}else{ echo htmlspecialchars($this->con->error); }
	
		}
		return $info;
	
	}
	
	private function ultimos_alumnos($id_user){

		if($sql = $this->con->prepare("SELECT id_alu FROM _jardinva_prestamos WHERE id_user_devolvio='0' OR fecha_devolvio=?")){
		if($sql->bind_param("s", $this->fecha_devolvio)){
		if($sql->execute()){

			$prestamos = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
			$aux_alu = Array();
			if(count($prestamos) > 0){
			
				if($sqlx = $this->con->prepare("SELECT t2.id_alu, t2.nombres, t2.apellido_p, t2.apellido_m FROM _jardinva_prestamos t1, _jardinva_alumnos t2 WHERE t1.id_user_presto=? AND t1.id_alu=t2.id_alu ORDER BY t1.id_pre DESC")){
				if($sqlx->bind_param("s", $id_user)){
				if($sqlx->execute()){

					$prestamos_user = $sqlx->get_result()->fetch_all(MYSQLI_ASSOC);
					
					for($i=0; $i<count($prestamos); $i++){
						if(!in_array($prestamos[$i]["id_alu"], $aux_alu)){
							$aux_alu[] = $prestamos[$i]["id_alu"];
							$aux['id'] = $prestamos[$i]["id_alu"];
							$aux['nombre'] = $prestamos[$i]['nombres']." ".$prestamos[$i]['apellido_p']." ".$sql_prestamos['resultado'][$i]['apellido_m'];
							$aux['count'] = $this->get_prestados_user($prestamos_user, $aux['id']);
							$info[] = $aux;
							unset($aux);
							if(count($aux_alu) >= 10){
								return $info;
							}
						}
					}
					return 0;
					
				}else{ echo htmlspecialchars($sqlx->error); }
				}else{ echo htmlspecialchars($sqlx->error); }
				}else{ echo htmlspecialchars($this->con->error); }

			}else{
				return 0;
			}

		}else{ echo htmlspecialchars($sql->error); }
		}else{ echo htmlspecialchars($sql->error); }
        }else{ echo htmlspecialchars($this->con->error); }

		return 0;		
		
	}
	public function get_libro(){

		$info["lib"] = 0;
		$qr = (isset($_GET["id"])) ? $_GET["id"] : 0 ;
		if($qr != 0){

			if($sql = $this->con->prepare("SELECT * FROM _jardinva_libros WHERE qr=? AND eliminado=?")){
				if($sql->bind_param("si", $qr, $this->eliminado)){
					if($sql->execute()){
	
						$libros = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
						$info["lib"] = 1;
						$info["id_lib"] = $libros['id_lib'];
						$info["nombre"] = $libros['nombre'];
						$info["codigo"] = $libros['codigo'];
						$info["prestamos"] = $this->get_prestamos($libros['id_lib']);
						$info["estado"] = $this->get_estado_libro($libros['id_lib']);
	
					}else{ echo htmlspecialchars($sql->error); }
				}else{ echo htmlspecialchars($sql->error); }
			}else{ echo htmlspecialchars($this->con->error); }

		}		
		return $info;

	}
	
	private function get_prestamos($id_lib){

		if($sql = $this->con->prepare("SELECT t1.id_user_presto, t1.fecha_presto, t1.id_user_devolvio, t1.fecha_devolvio, t1.email, t1.estado, t1.comentario, t2.id_alu, t2.nombres, t2.apellido_p, t2.apellido_m FROM _jardinva_prestamos t1, _jardinva_alumnos t2 WHERE t1.id_lib=? AND t1.id_alu=t2.id_alu")){
			if($sql->bind_param("i", $id_lib)){
				if($sql->execute()){

					$libros = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
					if(count($libros) > 0){
						return $libros;
					}else{
						return 0;
					}

				}else{ echo htmlspecialchars($sql->error); }
			}else{ echo htmlspecialchars($sql->error); }
		}else{ echo htmlspecialchars($this->con->error); }

	}
	private function get_estado_libro($id_lib){

		$info["prestado"] = 0;

		if($sql = $this->con->prepare("SELECT t1.id_user_presto, t1.fecha_presto, t1.id_user_devolvio, t1.fecha_devolvio, t1.email, t1.estado, t1.comentario, t2.id_alu, t2.nombres, t2.apellido_p, t2.apellido_m FROM _jardinva_prestamos t1, _jardinva_alumnos t2 WHERE t1.id_lib=? AND t1.id_alu=t2.id_alu")){
			if($sql->bind_param("i", $id_lib)){
				if($sql->execute()){

					$estado = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
					if(count($estado) == 1){
						$info["prestado"] = 1;
						$info["id_user_presto"] = $estado[0]['id_user_presto'];
						$info["nombre"] = $estado[0]['nombres']." ".$estado[0]['apellido_p']{0}.". ".$estado[0]['apellido_m']{0}.".";
						$info["fecha_presto"] = $estado[0]['fecha_presto'];
					}

				}else{ echo htmlspecialchars($sql->error); }
			}else{ echo htmlspecialchars($sql->error); }
		}else{ echo htmlspecialchars($this->con->error); }

		return $info;

	}
	public function prestados_user($id_user){

		if($sql = $this->con->prepare("SELECT t1.id_user_presto, t1.fecha_presto, t1.id_user_devolvio, t1.fecha_devolvio, t1.email, t1.estado, t1.comentario, t2.id_alu, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre, t3.codigo FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3 WHERE t1.id_user_presto=? AND t1.fecha_devolvio='0000-00-00 00:00:00' AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib")){
			if($sql->bind_param("i", $id_user)){
				if($sql->execute()){

					$prestamos = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
					if(count($prestamos) > 0){
						return $prestamos;
					}else{
						return 0;
					}

				}else{ echo htmlspecialchars($sql->error); }
			}else{ echo htmlspecialchars($sql->error); }
		}else{ echo htmlspecialchars($this->con->error); }

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

		if($sqlx = $this->con->prepare("SELECT id_alu FROM _jardinva_prestamos WHERE id_user_presto='0' OR fecha_devolvio=?")){
			if($sqlx->bind_param("s", $this->fecha_devolvio)){
				if($sqlx->execute()){

					$prestamos = $sqlx->get_result()->fetch_all(MYSQLI_ASSOC);
					if($sql = $this->con->prepare("SELECT id_alu, nombres, apellido_p, apellido_m FROM _jardinva_alumnos WHERE eliminado=?")){
						if($sql->bind_param("i", $this->eliminado)){
							if($sql->execute()){
			
								$alumnos = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
			
								for($i=0; $i<count($alumnos); $i++){
									$aux['id'] = $alumnos[$i]['id_alu'];
									$aux['nombre'] = $alumnos[$i]['nombres']." ".$alumnos[$i]['apellido_p']." ".$alumnos[$i]['apellido_m'];
									$aux['count'] = $this->get_prestados_user($prestamos, $alumnos[$i]['id_alu']);
									$data[] = $aux;
									unset($aux);
								}
								return $data;
			
							}else{ echo htmlspecialchars($sql->error); }
						}else{ echo htmlspecialchars($sql->error); }
					}else{ echo htmlspecialchars($this->con->error); }

				}else{ echo htmlspecialchars($sqlx->error); }
			}else{ echo htmlspecialchars($sqlx->error); }
		}else{ echo htmlspecialchars($this->con->error); }


	}
	public function libro_cron(){
		

		if($sql = $this->con->prepare("SELECT t1.id_pre, t1.fecha_presto, t2.email_01, t2.email_02, t2.nombres, t2.apellido_p, t2.apellido_m, t3.nombre FROM _jardinva_prestamos t1, _jardinva_alumnos t2, _jardinva_libros t3  WHERE t1.email='0' AND t1.fecha_devolvio=? AND t1.id_user_devolvio='0' AND t1.id_alu=t2.id_alu AND t1.id_lib=t3.id_lib")){
            if($sql->bind_param("s", $this->fecha_devolvio)){
                if($sql->execute()){

					$alumnos = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
					for($i=0; $i<count($alumnos); $i++){
						$alumno = $alumnos[$i];
						$fecha = time() - strtotime($alumno['fecha_presto']);
						if($fecha > 43200){

							if($sqld = $this->con->prepare("UPDATE _jardinva_prestamos SET email='1' WHERE id_pre=?")){
								if($sqld->bind_param("i", $alumno["id_pre"])){
									if($sqld->execute()){

										$nombre = $alumno["nombres"]." ".$alumno["apellido_p"]{0}.". ".$alumno["apellido_m"]{0}.".";
										$fecha_p = $this->get_date(time()+432000);
										if(filter_var($alumno['email_01'], FILTER_VALIDATE_EMAIL)){
											$alumno['email_01'] = "misitiodelivery@gmail.com";
											$this->enviar_correo($alumno['email_01'], $nombre, $alumno['nombre'], $fecha_p, 2);
										}
										if(filter_var($alumno['email_02'], FILTER_VALIDATE_EMAIL)){
											//$this->enviar_correo($alumno['email_02'], $nombre, $alumno['nombre'], $fecha_p, 2);
										}

									}else{ echo htmlspecialchars($sqld->error); }
								}else{ echo htmlspecialchars($sqld->error); }
							}else{ echo htmlspecialchars($this->con->error); }
						}
					}

                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($sql->error); }
		}else{ echo htmlspecialchars($this->con->error); }
		
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