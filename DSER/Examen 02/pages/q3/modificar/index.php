<?php
include_once '../../../model/country.php';
$countryOBJ = new countryModel();
$countriesView = [];
$CountryCode;
if(isset($_GET["pais"])){
$CountryCode = $_GET["pais"];
$countriesView = $countryOBJ->getSingleCityData($_GET["pais"]);
}



$modificar = false;
if(isset($_GET["checkmodify"])){
    $modificar = true;
}
if(isset($_GET["year"])){
    if($_GET["modificar"] == true){
    $resultado = $countryOBJ->modificarCountry($_GET["code"],$_GET["name"],$_GET["continent"],$_GET["surface"],$_GET["year"],$_GET["pop"],$_GET["exp"],$_GET["cap"]);
        if ($resultado == false) {
        echo ("ERROR, INTRODUCE UNO QUE EXISTA");
        }
    }else{
            $countryOBJ->modificarCountrySinCity($_GET["code"],$_GET["continent"],$_GET["surface"],$_GET["year"],$_GET["pop"],$_GET["exp"]);

    }
}
include_once "index.html.php";

?>