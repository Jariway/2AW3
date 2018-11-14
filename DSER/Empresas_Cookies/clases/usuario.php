<?php
    session_start();
    include_once "conexion.php";
    class usuarioClass{
        private $id;
        private $usuario;
        private $contrasena;
        private $nombre;
        private $apellido;
        private $email;
        private $rango;
        public function __contructor(){
            
        }
        
        public function comprobarLogin(){
            if(!isset($_SESSION["usuario"])){
                header("Location: http://" .urlGeneral. "/acceso/login"); 
                die();
            } 
        }
        public function soloAdministrador(){
            if($_SESSION["rango"] != 2){
                header("Location: http://" .urlGeneral); 
                die();
            } 
        }
        public function nuevo($nombre,$apellido,$usuario,$email,$contrasena,$rContrasena){
            $this->comprobacionesNuevo($usuario,$email,$contrasena,$rContrasena);
            $conexion = new conexion();
            $contrasena = $this->hashearContrasena($contrasena);
            $conexion->query(" CALL `spNuevoUsuario`('$nombre','$apellido','$usuario','$email','$contrasena')"); 
            unset($conexion);
            $this->iniciarSession($usuario);
        }
        
        public function hashearContrasena($contrasena){
            return password_hash($contrasena, PASSWORD_DEFAULT);
        }
        public function comprobacionesNuevo($usuario,$email,$contrasena,$rContrasena){
            if($this->usuarioLibre($usuario) &&
                $this->emailLibre($email) &&
                $this->contrasenasCoinciden($contrasena,$rContrasena)
            ){
               
            } else {
                header("Location: http://" .urlGeneral. "/acceso/register?error=0");
                die();
            }
        }
        
        public function usuarioLibre($usuario){
            $conexion = new conexion();
            $result = $conexion->query("CALL `spUsuarioLibre`('$usuario')");
            unset($conexion);
            if(isset($result->fetch()["idUser"])){
                header("Location: http://" .urlGeneral. "/acceso/register?error=1"); 
                die();
            } else {
                return true;
            }
        }
        public function emailLibre($email){
            $conexion = new conexion();
            $result = $conexion->query("CALL `spEmailLibre`('$email')");
            unset($conexion);
            if(isset($result->fetch()["idUser"])){
                header("Location: http://".urlGeneral."/acceso/register?error=2");
                die();
            } else {
                return true;
            }
        }
        public function contrasenasCoinciden($contrasena,$rContrasena){
            if($contrasena == $rContrasena){
                return true;
            
            } else {
               header("Location: http://" .urlGeneral. "/acceso/register?error=3"); 
               die();
            }   
        }

        public function login($usuario,$contrasena){
            $this->credencialesCorrectos($usuario,$contrasena); 
            
            $this->iniciarSession($usuario);
        }
        public function iniciarSession($usuario){
            $datos = $this->datosSession($usuario);
            
            $_SESSION["usuario"] = $usuario;
            $_SESSION["idUsuario"] = $datos[0];
            $_SESSION["rango"] = $datos[1];

            header("Location: http://" .urlGeneral); 
            die(); 
        }
        public function datosSession($usuario){
            $conexion = new conexion();
            $result = $conexion->query("CALL `spDatosSession`('$usuario')");
            unset($conexion);
            $linea = $result->fetch();
            return [$linea["idUser"],$linea["rango"]];
        }
        public function credencialesCorrectos($usuario,$contrasena){
            $conexion = new conexion();
            $result = $conexion->query("CALL `spContrasenaUsuario`('$usuario')");
            unset($conexion);
            $bdContrasena = $result->fetch()["password"];
            if(!isset($bdContrasena)){
                header("Location: http://" .urlGeneral. "/acceso/login?error=5"); 
                die();
            } 
            $this->contrasenaCorrecta($contrasena,$bdContrasena); 

        }
        public function contrasenaCorrecta($contrasena,$bdContrasena){
            if(!password_verify($contrasena, $bdContrasena)) {
                header("Location: http://" .urlGeneral. "/acceso/login?error=6"); 
                die();
            }  
        }
        public function escribirUsuario(){
            $usuario = $_SESSION["usuario"];
            $rango = $_SESSION["rango"];
            $administrador = "";
            if($rango == 2){
                $administrado = "administrador";
            }
            $div = "<p class='$administrador'> Usuario: $usuario</p>";
            echo $div;
        }
        public function cerrarSession(){
            session_destroy();
            header("Location: http://" .urlGeneral); 
            die();
        }
        public function nuevaEmpresaLink(){
            if($_SESSION["rango"] == 2){
                echo "<a href='nuevaEmpresa'>Crear Empresa</a>";
            } 
        }
        public function getIdSession(){
            return $_SESSION["idUsuario"];
        }
    }
?>