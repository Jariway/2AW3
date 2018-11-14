<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Añadir Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="addEmpresa.css" />
</head>
<body>
    <form action="" method="post">
        <label>
            <p>Selecciona Empresa:</p>
            <select name="empresa">
                <?php
                    $empresaOBJ->empresasDisponiblesOPT(); 
                ?>
            </select>
        </label>
        <input type="submit" value="Añadir Empresa"/>
    </form>
</body>
</html>