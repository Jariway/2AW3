<?php
    include_once "ajustes.php";
    include_once "clases/usuario.php";
    $objUsuario = new usuarioClass();

    if(isset($_GET["logout"])){
        $objUsuario->cerrarSession();
    }

    $objUsuario->comprobarLogin();   



    include_once "index/index.html.php";
?>