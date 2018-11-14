<?php
    include "../../ajustes.php";

    if(isset($_POST["usuario"])){
        include_once "../../clases/usuario.php";
        $objUsuario = new usuarioClass();
        
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $objUsuario->login($usuario,$contrasena);
    }


    include_once "login.html.php";
?>