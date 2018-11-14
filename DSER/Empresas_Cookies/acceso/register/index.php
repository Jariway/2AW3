<?php
    include_once "../../ajustes.php";

    if(isset($_POST["nombre"])){
        include_once "../../clases/usuario.php";
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];
        $rContrasena = $_POST["rContrasena"];
        $objUsuario = new usuarioClass();
        $objUsuario->nuevo($nombre,$apellido,$usuario,$email,$contrasena,$rContrasena);
    }


    include_once "register.html.php";
?>