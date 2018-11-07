<?php
include_once "../model/country.php";
$country = new countryModel();

$lista = $country->getPaisesIdiomaCastellano();
include_once "../view/viewVistaPorIdioma.php";
