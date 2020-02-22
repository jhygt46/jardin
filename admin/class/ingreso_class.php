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

class Ingreso {
    
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

        $this->con = new mysqli($this->host[0], $this->usuario[0], $this->password[0]);

    }
    public function ingresar_user(){
                
        if(filter_var($_POST['user'], FILTER_VALIDATE_EMAIL)){

            if($sql = $this->con->prepare("SELECT * FROM usuarios WHERE correo=? AND eliminado=?")){
                if($sql->bind_param("si", $_POST["user"], $this->eliminado)){
                    if($sql->execute()){
    
                        $usuarios = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
                        if(count($usuarios) == 0){
                            $info['op'] = 2;
                            $info['message'] = "Error: Usuario no existe";
                        }
                        if(count($usuarios) == 1){

                            $pass = $usuarios[0]['pass'];
                            if($pass == md5($_POST['pass'])){
                                
                                $tipo = $usuarios[0]['tipo'];
                                if($tipo == 0){
                                    $_SESSION['user'] = $this->session($usuarios[0]);
                                    $info['op'] = 1;
                                    $info['tipo'] = 0;
                                    $info['message'] = "Ingreso Exitoso";
                                }
                                if($tipo == 1){
                                    $info['hash'] = $this->pass_generate(50);
                                    if($sql = $this->con->prepare("UPDATE usuarios SET code_cookie=? WHERE id_user=?")){
                                        if($sql->bind_param("si", $info["hash"], $usuarios[0]['id_user'])){
                                            if($sql->execute()){
                                                $info['op'] = 1;
                                                $info['tipo'] = 1;
                                                $info['message'] = "Ya puede escanear";
                                                $info['uid'] = $usuarios[0]['id_user'];
                                            }else{ echo htmlspecialchars($sql->error); }
                                        }else{ echo htmlspecialchars($sql->error); }
                                    }else{ echo htmlspecialchars($this->con->error); }
                                }
                                
                            }else{
                                $info['op'] = 2;
                                $info['message'] = "Contrase&ntilde;a Invalida";
                            }

                        }
    
                    }else{ echo htmlspecialchars($sql->error); }
                }else{ echo htmlspecialchars($sql->error); }
            }else{ echo htmlspecialchars($this->con->error); }
        
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
    private function session($user){
        $aux['info']['id_user'] = $user['id_user'];
        $aux['info']['nombre'] = $user['nombre'];
        return $aux;   
    }
    
}

?>