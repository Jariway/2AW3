<?php
include_once "../conexion.php";
$conexion = new conexion();

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$curso = $_POST["curso"];

$result = $conexion->query("CALL `spAnadirAlumno`('$nombre',$edad, $curso)");
echo $result;
