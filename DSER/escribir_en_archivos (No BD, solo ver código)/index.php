<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
       <?php
if(filter_input(INPUT_COOKIE,'usuario')!=NULL){
    ?>
    <img src="imagenes/google.jpg" style="max-width:200px;">
    <form action="controller/controller_info.php" method="post">
        <input type="text" name="buscar"><br>
        <input type="submit" value="buscar">
    </form>


    <?php }else{ ?>

    
    <form action="controller/controller_cookies.php" method="post">
        <p> Usuario: <input type="text" name="usuario"/></p>
        <p>Contraseña: <input type="password" name="contrasena" required /></p>
        <input type="submit" value="Login">
        <input type="checkbox" name="recordar"> Recuerdame
    </form>
    <?php } ?>
</body>
</html>
