<?php
    class conexion {
        private $servidor = "192.168.0.166";
        private $base = "eskola";
        private $usuario = "clase";
        private $contraseña = "root1";
        private $pdo; 

        public function __construct() {
            try {
                $this->pdo = new PDO("mysql:host=$this->servidor; dbname=$this->base", "$this->usuario", "$this->contraseña");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->exec("SET NAMES \"utf8\"");
            } catch (PDOException $error) {
                echo "Error con la base de datos: ";
                echo "------------------------------------><br>";
                echo $error;
            }
        }
        public function query($query) {
            try {
                $resultado = $this->pdo->query($query);
                return $resultado;
            } catch (PDOException $error) {
                echo "Error con la base de datos: ";
                echo "------------------------------------><br>";
                echo $error;
            }
        }
        public function exec($query) {
            try {
                $this->pdo->exec($query);
            } catch (PDOException $error) {
                echo "Error con la base de datos: ";
                echo "------------------------------------><br>";
                echo $error;
            }
        }
    }
?>