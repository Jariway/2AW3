<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../acceso.css">

    <!--     <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    -->
    </head>
    <body>
        <?php
            if(isset($_GET["error"])){
                echo $_GET["error"];
            }

        ?>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre"required/>
            <input type="text" name="apellido" placeholder="Apellido" required/>
            <input type="text" name="usuario" placeholder="Nombre de Usuario" required/>
            <input type="text" name="email" placeholder="Correo Electronico" required/>
            <input type="password" name="contrasena" placeholder="Introduzca una Contraseña" required/>
            <input type="password" name="rContrasena" placeholder="Repita la contraseña" required/>
            <input type="submit" value="Registar Usuario"/>
        </form>
        <a href="<?php echo "http://".urlGeneral."/acceso/login" ?>">Ya tienes cuenta? Inicia session</a>
    </body>
</html>