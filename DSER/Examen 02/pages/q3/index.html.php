<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Q3</title>
</head>

<body>
    <h2>3.Galdera / Pregunta 3</h2><br>
    <form action="modificar/index.php" method="get">
        <select name="pais" id="pais    ">

            <?php
                foreach ($countriesView as $country) {
                    echo ("<option value='" . $country->getCode() . "'>" . $country->getName() . " </option>");
                }
            ?>
        </select>
        <input type="checkbox" name="checkmodify" id="modify">Modificar name or capital
        <br><br>
        <input type="submit" name="modificar" value="Modificar">

    </form>
</body>

</html>