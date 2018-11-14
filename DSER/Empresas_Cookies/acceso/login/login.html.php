<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
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
                <input type="text" name="usuario" placeholder="Usuario"/>
                <input type="password" name="contrasena" placeholder="Contraseña"/>
                <input type="submit" value="Inciar Session"/>
            </form>
            <a href="<?php echo "http://".urlGeneral."/acceso/register" ?>">No tienes cuenta? Registrate ahora mismo</a>
    </body>
</html>