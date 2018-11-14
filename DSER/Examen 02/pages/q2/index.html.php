<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Q2</title>
</head>

<body>
    <h2>2.Galdera / Pregunta 2</h2><br>

    <h2>City Country info</h2>

    <form action="index.php" method="get">
        <select name="pais" id="pais    ">

            <?php
                foreach($countriesView as $country){
                    echo ("<option value='" . $country->getCode() . "'>" . $country->getName() . " </option>");
                    }
            ?>
        </select>
        <br><br>
        <input type="submit" name="cookie" value="cookie">
        <a href="datos/index.php?ncities=true">Number of cities</a><br><br>
        <a href="datos/index.php">Total population</a><br><br>
    </form>
</body>

</html>