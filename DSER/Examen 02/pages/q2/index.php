<?php

include_once '../../model/country.php';
$countryOBJ = new countryModel();

$countriesView = [];
$countriesView = $countryOBJ->getCountries();

if(isset($_GET["cookie"])){
    setcookie("pais", $_GET["pais"], time() + (3600), "/"); // 86400 = 1 day
}

include_once 'index.html.php';
?>