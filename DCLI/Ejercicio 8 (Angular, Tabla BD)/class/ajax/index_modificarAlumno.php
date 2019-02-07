<?php
    include_once "../clases/conexion.php";
    $conexion = new conexion();

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad =$_POST["edad"];
    $curso = $_POST["curso"];
    
    $result = $conexion->query("CALL `spModificarAlumno`($id, '$nombre', $edad, $curso)");
    echo $result;

?>