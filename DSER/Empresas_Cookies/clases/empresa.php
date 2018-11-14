<?php
    include_once "conexion.php";
    include_once "../ajustes.php";

    class empresaClass{
        private $idEmpresa;
        private $nombre;
        private $telefono;
        private $web;
        private $direccion;
        private $sector;
        private $imagen;

        public function __contruct(){

        }
        public function getIdEmpresa(){
            return $this->idEmpresa;
        }
        public function setIdEmpresa($idEmpresa){
            $this->idEmpresa = $idEmpresa;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function getWeb(){
            return $this->web;
        }
        public function setWeb($web){
            $this->web = $web;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function getSector(){
            return $this->sector;
        }
        public function setSector($sector){
            $this->sector = $sector;
        }
        public function getImagen(){
            return $this->imagen;
        }
        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function nueva(){
            $conexion = new conexion();
            $result = $conexion->query("CALL `spNuevaEmpresa`('".$this->getNombre()."','".
                                                                $this->getTelefono()."','".
                                                                $this->getWeb()."','".
                                                                $this->getDireccion()."','".
                                                                $this->getSector()."');");
            unset($conexion);
            $nuevaId = $result->fetch()["ultimo"];
            $this->subirFoto($nuevaId);
            header("Location: http://" .urlGeneral); 
            die();

        }
        public function subirFoto($nuevaId){
            $directorio = "../img/empresas/";
            if ($this->imagen["error"] > 0){
                echo "No se ha podido subir la imagen. Error: " . $this->imagen["error"] . "<br>";
            }else{
                move_uploaded_file($this->imagen["tmp_name"],
                    $directorio . "$nuevaId.jpg");
            }
        }
    }
    class empresaModel{
        private $empresas = [];
        public function __construct(){

        }

        public function rellenarEmpresasDisponiblesOPT(){
            include_once "usuario.php";
            $usuarioOBJ = new usuarioClass();

            
            $idUsuario = $usuarioOBJ->getIdSession();
            $conexion = new conexion();
            $result = $conexion->query("SELECT idCompany,name
                                        FROM company
                                        WHERE idCompany NOT IN (SELECT idCompany from list WHERE idUser= $idUsuario)");
            unset($conexion);
            foreach ($result as $linea) {
                $empresaOBJ = new empresaClass();
                $empresaOBJ->setIdEmpresa($linea["idCompany"]);
                $empresaOBJ->setNombre($linea["name"]);
                $this->empresas[] = $empresaOBJ;
                unset($empresaOBJ);
            }
        }
        public function empresasDisponiblesOPT(){
            $this->rellenarEmpresasDisponiblesOPT();
            foreach ($this->empresas as $empresa) {
                $option = "<option value='".$empresa->getIdEmpresa()."'>".$empresa->getNombre()."</option>";
                echo $option;
            }
        }
    }

?>