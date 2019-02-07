<?php
    include_once "../clases/conexion.php";
    $conexion = new conexion();

    $id = $_POST["id"];
    $datos = $conexion->query("CALL `spDatosAlumno`($id)");
    
    echo json_encode($datos->fetch());

?>