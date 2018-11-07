<?php
include_once "conexion.php";

class countryClass {

    protected $Code;
    protected $Name;
    protected $Continent;
    protected $SurfaceArea;
    protected $IndepYear;
    protected $Population;
    protected $LifeExpectancy;
    protected $Capital;

    public function __construct() {

    }

    public function getCode() {
        return $this->Code;
    }
    public function getName() {
        return $this->Name;
    }

    public function getContinent() {
        return $this->Continent;
    }

    public function getSurfaceArea() {
        return $this->SurfaceArea;
    }

    public function getIndepYear() {
        return $this->IndepYear;
    }

    public function getPopulation() {
        return $this->Population;
    }

    public function getLifeExpectancy() {
        return $this->LifeExpectancy;
    }

    public function getCapital() {
        return $this->Capital;
    }

    public function setCode($Code) {
        $this->Code = $Code;
    }
    public function setName($Name) {
        $this->Name = $Name;
    }

    public function setContinent($Continent) {
        $this->Continent = $Continent;
    }

    public function setSurfaceArea($SurfaceArea) {
        $this->SurfaceArea = $SurfaceArea;
    }

    public function setIndepYear($IndepYear) {
        $this->IndepYear = $IndepYear;
    }

    public function setPopulation($Population) {
        $this->Population = $Population;
    }

    public function setLifeExpectancy($LifeExpectancy) {
        $this->LifeExpectancy = $LifeExpectancy;
    }

    public function setCapital($Capital) {
        $this->Capital = $Capital;
    }

}

class countryModel {

    public function __construct() {

    }

    public function getPaisesPorContinente($ppais) {

        $this->list = array();
        $datos = [];
        $conexion = new conexion();
        $result = $conexion->query("CALL `spGetPaisesPorContinente`('$ppais')");

        foreach ($result as $fila) {
            $countryObj = new countryClass();

            $countryObj->setCapital($fila["Capital"]);
            $countryObj->setCode($fila["Code"]);
            $countryObj->setContinent($fila["Continent"]);
            $countryObj->setIndepYear($fila["IndepYear"]);
            $countryObj->setLifeExpectancy($fila["LifeExpectancy"]);
            $countryObj->setName($fila["Name"]);
            $countryObj->setPopulation($fila["Population"]);
            $countryObj->setSurfaceArea($fila["SurfaceArea"]);

            array_push($datos, $countryObj);

        }
        return $datos;
    }

    public function getPaisesIdiomaCastellano() {

        $this->list = array();
        $datos = [];
        $conexion = new conexion();
        $result = $conexion->query("CALL `spGetSpanishCountries`()");

        foreach ($result as $fila) {
            $countryObj = new countryClass();
            $countryObj->setContinent($fila["Continent"]);
            $countryObj->setName($fila["Name"]);
            $countryObj->setPopulation($fila["Population"]);

            array_push($datos, $countryObj);

        }
        return $datos;

    }



}
