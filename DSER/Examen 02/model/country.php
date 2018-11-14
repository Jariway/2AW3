<?php
include_once "conexion.php";

class countryClass {

private $code;
private $name;
private $continent;
private $surfaceArea;
private $indepYear;
private $population;
private $lifeExpectancy;
private $capital;
private $capitalName;

public function getCode() {
return $this->code;
}


public function setCode($code){
$this->code = $code;

}

public function getName(){
return $this->name;
}


public function setName($name){
$this->name = $name;

}


public function getContinent(){
return $this->continent;
}

public function setContinent($continent){
$this->continent = $continent;

}
 
public function getSurfaceArea(){
return $this->surfaceArea;
}

public function setSurfaceArea($surfaceArea){
$this->surfaceArea = $surfaceArea;

}

public function getIndepYear(){
return $this->indepYear;
}

public function setIndepYear($indepYear){
$this->indepYear = $indepYear;

}

public function getPopulation(){
return $this->population;
}


public function setPopulation($population){
$this->population = $population;

}

public function getLifeExpectancy(){
return $this->lifeExpectancy;
}


public function setLifeExpectancy($lifeExpectancy){
$this->lifeExpectancy = $lifeExpectancy;

}
 
public function getCapital(){
return $this->capital;
}

public function setCapital($capital){
$this->capital = $capital;

}

public function getCapitalName(){
return $this->capitalName;
}

public function setCapitalName($capitalName){
$this->capitalName = $capitalName;

}

}

class countryModel {

private $countries = [];


public function getCountries(){

            $conexion = new conexion();
            $result = $conexion->query("CALL spGetCountries()");
            unset($conexion);
            foreach ($result as $linea) {
                $countryOBJ = new countryClass();
                $countryOBJ->setCode($linea["id"]);
                $countryOBJ->setName($linea["nombre"]);
                $this->countries[$linea["id"]] = $countryOBJ;
                unset($countryOBJ);
            }
            return $this->countries;
}

public function getCountryPopulation($countryCode){

            $conexion = new conexion();
            $result = $conexion->query("CALL spGetCountryPopulation('". $countryCode ."')");
            unset($conexion);
            $resultado = 0;
            foreach ($result as $linea) {
                $resultado = $linea["pop"];
            }
            return $resultado;

}
public function getCountryNumberOfCities($countryCode){

            $conexion = new conexion();
            $result = $conexion->query("CALL spGetNCities('". $countryCode ."')");
            unset($conexion);
            $resultado = 0;
            foreach ($result as $linea) {
                $resultado = $linea["num"];
            }
            return $resultado;

}

public function getSingleCityData($countryCode){

            $conexion = new conexion();
            $result = $conexion->query("CALL spGetSingleCountryData('". $countryCode ."')");
            unset($conexion);
            foreach ($result as $linea) {
                $countryOBJ = new countryClass();
                $countryOBJ->setCode($linea["Code"]);
                $countryOBJ->setName($linea["Name"]);
                $countryOBJ->setContinent($linea["Continent"]);
                $countryOBJ->setSurfaceArea($linea["SurfaceArea"]);
                $countryOBJ->setIndepYear($linea["IndepYear"]);
                $countryOBJ->setPopulation($linea["Population"]);
                $countryOBJ->setLifeExpectancy($linea["LifeExpectancy"]);
                $countryOBJ->setCapitalName($linea["ciudad"]);
                $this->countries[$linea["Code"]] = $countryOBJ;
                unset($countryOBJ);
            }
            return $this->countries;

}

public function modificarCountry($pcode,$pname,$pcontinent,$psurface,$pyear,$ppop,$pexp,$pcap){
$resultado = false;
    try {
                $conexion = new conexion();
                $conexion->exec("CALL spModificar('$pcode','$pname','$pcontinent','$psurface','$pyear','$ppop','$pexp','$pcap')");
                unset($conexion);
                $resultado = true;
            } catch (PDOException $e) {
                                $resultado = false;
                echo "$e";
            }
            return $resultado;
}
public function modificarCountrySinCity($pcode,$pcontinent,$psurface,$pyear,$ppop,$pexp){

    try {
                $conexion = new conexion();
                $conexion->exec("CALL spModificarSinCity('$pcode','$pcontinent','$psurface','$pyear','$ppop','$pexp')");
                unset($conexion);
                
            } catch (PDOException $e) {
                echo "$e";
            }
}

}
?>