<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="get">
        <label for="">Codigo</label><br>
        <input type="text" value="<?php echo ($countriesView[$CountryCode]->getCode()) ?>" name="code" id=""><br>
        <label for="">Name</label><br>

        <input type="text" name="name" value="<?php echo ($countriesView[$CountryCode]->getName()) ?>" id=""><br>
        <label for="">Continent</label><br>
        <input type="text" value="<?php echo ($countriesView[$CountryCode]->getContinent()) ?>" name="continent" id=""><br>
        <label for="">Surface</label><br>
        <input value="<?php echo ($countriesView[$CountryCode]->getSurfaceArea()) ?>" type="text" name="surface" id=""><br>
        <label for="">Year</label><br>
        <input type="text" name="year" value="<?php echo ($countriesView[$CountryCode]->getIndepYear()) ?>" id=""><br>
        <label for="">Population</label><br>
        <input value="<?php echo ($countriesView[$CountryCode]->getPopulation()) ?>" type="text" name="pop" id=""><br>
        <label for="">Life Expectancy</label><br>
        <input value="<?php echo ($countriesView[$CountryCode]->getLifeExpectancy()) ?>" type="text" name="exp" id=""><br>
        <label for="">Capital name</label><br>
        <input value="<?php echo ($countriesView[$CountryCode]->getCapitalName()) ?>" type="text" name="cap" id=""><br>
        <input type="hidden" value="<?php echo ($modificar) ?>" name="modificar">
        <button type="submit">Modificar</button>
    </form>
</body>

</html>