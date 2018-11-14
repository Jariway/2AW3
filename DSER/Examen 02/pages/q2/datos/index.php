<?php
if(!isset($_COOKIE["pais"])) {
    echo "La cookie pais no se ha establecido!";
} else{
include_once '../../../model/country.php';
$countryOBJ = new countryModel();
$parameter;
if(!isset($_GET["ncities"])){
    $parameter = "Population: ";
$data = $countryOBJ->getCountryPopulation($_COOKIE["pais"]);

}else{
$parameter = "Number of cities: ";
$data = $countryOBJ->getCountryNumberOfCities($_COOKIE["pais"]);
}

include_once "index.html.php";
}


?>