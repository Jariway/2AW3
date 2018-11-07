<?php
include_once "../model/city.php";
$ciudadObj = new cityModel();

$ciudadObj->insertCities($_GET["pname"],$_GET["pcode"],$_GET["ppopulation"]);

$url = "../index.php";
    header("Location: $url");
    die();

?>