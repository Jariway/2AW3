<?php
    include_once "../conexion.php";
    $conexion = new conexion();

    $datos = $conexion->query("CALL `spListarAlumnos`()");

    echo json_encode($datos->fetchAll());

?>