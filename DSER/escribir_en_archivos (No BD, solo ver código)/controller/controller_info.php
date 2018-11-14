<?php

include '../funciones/funciones.php';
$busqueda = filter_input(INPUT_POST,"buscar");
$dateTime=getMyDateTime();
$ip=getIp();
$browser=getBrowser();
$lang=getLenguaje();
saveLog($dateTime, $ip,$browser,$lang,$busqueda);


header("Location: https://www.google.es/search?q=$busqueda");
header("Location: ../index.php");


