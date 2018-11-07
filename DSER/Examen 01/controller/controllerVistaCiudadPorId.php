<?php
include_once "../model/city.php";
$city = new cityModel();

// Podría hacer isset etc pero no da tiempo
$lista = $city->getCityPorId($_GET["idCity"]);
include_once "../view/viewCiudadPorID.php";
