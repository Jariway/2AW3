<?php
    include_once "../clases/conexion.php";
    $conexion = new conexion();

    $datos = $conexion->query("CALL `spListadoSelect`()");

    echo json_encode($datos->fetchAll());

?>