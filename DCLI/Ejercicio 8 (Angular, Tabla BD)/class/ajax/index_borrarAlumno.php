<?php
    include_once "../conexion.php";
    $conexion = new conexion();

    $id = $_POST["id"];
    $result = $conexion->query("CALL `spBorrarAlumno`($id)")

?>