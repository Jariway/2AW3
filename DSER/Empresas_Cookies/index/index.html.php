<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Empresas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="index/index.css" />
        <!--
        <script src="main.js"></script> -->
    </head>
    <body>
        <div class="usuario">
            <?php $objUsuario->escribirUsuario();?>
            <a href="?logout"><img src="img/logout.png"></a>
        </div>
        <table>
            <tr>
                <th>Logo</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Web</th>
                <th>Direccion</th>
                <th>Sector</th>
            </tr>
        </table>
        <a href="addEmpresa/">Añadir Empresa</a>
        <?php
            $objUsuario->nuevaEmpresaLink();
        ?>
    </body> 
</html>