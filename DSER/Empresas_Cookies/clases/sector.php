<?php
    include_once "conexion.php";
    class sectorClass{
        private $id;
        private $nombre;
        private $presupuesto;

        public function __construct() {

        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getPresupuesto(){
            return $this->presupuesto;
        }
        public function setPresupuesto($presupuesto){
            $this->presupuesto = $presupuesto;
        }
    
    }

    class sectorModel{
        private $sectores = [];
        public function __construct() {
            $conexion = new conexion();
            $result = $conexion->query("CALL `spSectores`()");
            unset($conexion);
            foreach ($result as $fila) {
                $objSector = new sectorClass();
                $objSector->setId($fila["id"]);
                $objSector->setNombre($fila["nombre"]);
                $objSector->setPresupuesto($fila["presupuesto"]);
                $this->sectores[] = $objSector;
                unset($objSector);
            }
        }
        
        public function getSectores(){
            return $this->sectores;
        }

        public function formulario_opt(){
            foreach ($this->sectores as $sector) {
                $option = "<option value='".$sector->getId()."'>".$sector->getNombre()."</option>";
                echo $option;
            }
        }
    }

    
?>