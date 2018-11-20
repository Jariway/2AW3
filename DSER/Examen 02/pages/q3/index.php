<?php
include_once '../../model/country.php';
$countryOBJ = new countryModel();

$countriesView = [];
$countriesView = $countryOBJ->getCountries();
include_once "index.html.php";
