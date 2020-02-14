<?php
session_start();

require_once($path_."/mysql_class.php");

class Ingreso {
    
    public $con = null;
    
    public function __construct(){
        
        $this->con = new Conexion();
        
    }
    
    public function ingresar_user(){
                
        if(filter_var($_POST['user'], FILTER_VALIDATE_EMAIL)){
            $user = $this->con->sql("SELECT * FROM usuarios WHERE correo='".$_POST['user']."' AND eliminado='0'");

            if($user['count'] == 0){
                // CORREO NO SE ENCUENTERA EN LA BASE DE DATOS
                $info['op'] = 2;
                $info['message'] = "Error: Usuario no existe";
                
            }
            if($user['count'] == 1){
                
                $block = $user['resultado'][0]['block'];
                
                if($block == 1){
                    $fecha_block = $user['resultado'][0]['fecha_block'];
                    if(strtotime($fecha_block)+86400 < time()){
                        $block = 0;
                        $this->con->sql("UPDATE usuarios SET block='0', intentos='0', fecha_block='' WHERE id_user='".$user['resultado'][0]['id_user']."'");
                        $user['resultado'][0]['intentos'] = 0;
                    }else{
                        $time = strtotime($fecha_block) - time() + 86400;
                        $hrs = date("H:i:s", $time);
                        $info['op'] = 2;
                        $info['message'] = "Su cuenta esta Bloqueada, se desbloqueara autom&aacute;ticamente en ".$hrs;
                    }
                }
                
                if($block == 0){

                    $pass = $user['resultado'][0]['pass'];
                    if($pass == md5($_POST['pass'])){
                        
			$tipo = $user['resultado'][0]['tipo'];

			if($tipo == 0){
				$_SESSION['user'] = $this->session($user['resultado'][0]);
                        	$info['op'] = 1;
				$info['tipo'] = 0;
                        	$info['message'] = "Ingreso Exitoso";
			}
			if($tipo == 1){
				$info['op'] = 1;
				$info['tipo'] = 1;
				$info['message'] = "Ya puede escanear";
				$info['uid'] = $user['resultado'][0]['id_user'];
				$info['hash'] = $this->pass_generate(50);
				$this->con->sql("UPDATE usuarios SET code_cookie='".$info['hash']."' WHERE id_user='".$user['resultado'][0]['id_user']."'");
			}
                        
                    }else{
                        $intentos = $user['resultado'][0]['intentos'] + 1;
                        $this->con->sql("UPDATE usuarios SET intentos='".$intentos."' WHERE id_user='".$user['resultado'][0]['id_user']."'");
                        if($intentos > 5){
                            $this->con->sql("UPDATE usuarios SET block='1', fecha_block='".date('Y-m-d H:i:s')."' WHERE id_user='".$user['resultado'][0]['id_user']."'");
                        }
                        $int = 6 - $intentos;
                        $info['op'] = 2;
                        $info['message'] = "Contrase&ntilde;a Invalida, le quedan ".$int." intentos";
                    }
                }
                
            }
        
        }
        
        return $info;    
            
    }
    public function pass_generate($n){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for($i=0; $i<$n; $i++){
            $r .= $chars{rand(0, strlen($chars)-1)};
        }
        return $r;
    }
    public function recuperar_password(){
        
        $id = $_POST['id'];
        $code = $_POST['code'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        
        $user = $this->con->sql("SELECT * FROM ilusuarios WHERE id_user='".$id."'");
        if($user['resultado'][0]['mailcode'] == $code && $pass1 == $pass2 && strlen($pass1) >= 8){
            $this->con->sql("UPDATE ilusuarios SET password='".md5($pass1)."', mailcode='' WHERE id_user='".$id."'");
            $info['op'] = 1;
            $info['user'] = $user['resultado'][0]['correo'];
        }
        return $info;
        
    }
    
    private function session($user){
        
        $aux['info']['id_user'] = $user['id_user'];
        $aux['info']['nombre'] = $user['nombre'];
        return $aux;
        
    }
    
    public function permisos_ususarios($id_user){
        
        $aux = Array();
        $permisos_per = $this->con->sql("SELECT t4.id_tar FROM perfiles_usuarios t1, perfiles t2, perfiles_tareas t3, tareas t4 WHERE t1.id_user='".$id_user."' AND t1.id_per=t2.id_per AND t2.id_per=t3.id_per AND t3.id_tar=t4.id_tar");
        for($i=0; $i<$permisos_per['count']; $i++){
            $aux[] = $permisos_per['resultado'][$i]['id_tar'];
        }
        return $aux;
        
    }

    
}

?>