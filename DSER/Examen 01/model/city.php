<?php
include_once "conexion.php";
include_once "country.php";

class cityClass {
    protected $ID;
    protected $Name;
    protected $CountryCode;
    protected $Population;

    protected $country;

    public function getID() {
        return $this->ID;
    }

    public function getName() {
        return $this->Name;
    }

    public function getCountryCode() {
        return $this->CountryCode;
    }

    public function getPopulation() {
        return $this->Population;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setName($Name) {
        $this->Name = $Name;
    }

    public function setCountryCode($CountryCode) {
        $this->CountryCode = $CountryCode;
    }

    public function setPopulation($Population) {
        $this->Population = $Population;
    }

    public function getCountry()
    {
        return $this->country;
    }


    public function setCountry($country)
    {
        $this->country = $country;

 
    }

}

class cityModel {

    protected $cities = [];

    public function insertCities($pname,$pcode,$ppop) {

        $conexion = new conexion();
        $conexion->exec("CALL `spInsertCity`('".$pname."','".$pcode."','".$ppop."')");

    }

        public function getCityPorId($pid) {
        $this->list = array();
        $datos = [];
        $conexion = new conexion();
        $result = $conexion->query("CALL `spGetCiudadPorID`('$pid')");

        //Está desordenado pero no hay tiempo
        foreach ($result as $fila) {
            $cityObj = new cityClass();
            $countryObj = new countryClass();
            $cityObj->setName($fila["cityname"]);
            $cityObj->setCountryCode($fila["countrycode"]);
            $cityObj->setPopulation($fila["population"]);
            $countryObj->setPopulation($fila["cpop"]);
            $countryObj->setName($fila["cname"]);
            $countryObj->setContinent($fila["Continent"]);
            $countryObj->setCapital($fila["Name"]);
            $cityObj->setCountry($countryObj);
          

            array_push($datos, $cityObj);

        }
        return $datos;

    }



}
