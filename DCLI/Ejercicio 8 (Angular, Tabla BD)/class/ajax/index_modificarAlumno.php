<?php
    include_once "../conexion.php";
    $conexion = new conexion();

    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $edad =$_POST["edad"];
    $curso = $_POST["curso"];
    
    $result = $conexion->query("CALL `spModificarAlumno`($id,$edad, $curso, '$nombre')");
    echo $result;

?>