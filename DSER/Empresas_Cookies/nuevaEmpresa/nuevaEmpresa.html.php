<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nueva Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="nuevaEmpresa.css" />
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre"/>
        <input type="text" name="telefono" placeholder="Telefono"/>
        <input type="text" name="web" placeholder="Pagina web"/>
        <input type="text" name="direccion" placeholder="Direccion"/>
        <label>
            <p>Selecciona sector:</p>
            <select name="sector">
                <?php
                    $objSectores->formulario_opt(); 
                ?>
            </select>
        </label>
        <input type="file" name="imagen" id="imagen"/>
        <input type="submit" value="Crear Empresa"/>
    </form>
</body>
</html>