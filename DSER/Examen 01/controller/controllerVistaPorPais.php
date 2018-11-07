<?php
include_once "../model/country.php";
$country = new countryModel();

$nombrePais = $_GET["cmbContinent"];
$lista = $country->getPaisesPorContinente($nombrePais);
include_once "../view/viewVistaPorPais.php";
