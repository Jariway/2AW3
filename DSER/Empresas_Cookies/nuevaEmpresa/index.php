<?php

    include_once "../ajustes.php";
    include_once "../clases/usuario.php";
    include_once "../clases/sector.php";
   

    $objSectores = new sectorModel();
    $objUsuario = new usuarioClass();
  
    
    $objUsuario->comprobarLogin();   
    $objUsuario->soloAdministrador();


    if(isset($_POST["nombre"])) {
        include_once "../clases/empresa.php";
        $objEmpresa = new empresaClass();
        
        $objEmpresa->setNombre($_POST["nombre"]);
        $objEmpresa->setTelefono($_POST["telefono"]);
        $objEmpresa->setWeb($_POST["web"]);
        $objEmpresa->setDireccion($_POST["direccion"]);
        $objEmpresa->setSector($_POST["sector"]);
        $objEmpresa->setImagen($_FILES["imagen"]);

        $objEmpresa->nueva();
        
    }

    include_once "nuevaEmpresa.html.php";


?>