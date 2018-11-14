<?php

class countryClass {
    
    protected $Code;
    protected $Name;
    protected $Continent;
    protected $SurfaceArea;
    protected $IndepYear;
    protected $Population;
    protected $LifeExpectancy;
    protected $Capital;
    
    function getCode() {
        return $this->Code;
    }
    function getName() {
        return $this->Name;
    }

        function getContinent() {
        return $this->Continent;
    }

    function getSurfaceArea() {
        return $this->SurfaceArea;
    }

    function getIndepYear() {
        return $this->IndepYear;
    }

    function getPopulation() {
        return $this->Population;
    }

    function getLifeExpectancy() {
        return $this->LifeExpectancy;
    }

    function getCapital() {
        return $this->Capital;
    }

    function setCode($Code) {
        $this->Code = $Code;
    }
    function setName($Name) {
        $this->Name = $Name;
    }

        function setContinent($Continent) {
        $this->Continent = $Continent;
    }

    function setSurfaceArea($SurfaceArea) {
        $this->SurfaceArea = $SurfaceArea;
    }

    function setIndepYear($IndepYear) {
        $this->IndepYear = $IndepYear;
    }

    function setPopulation($Population) {
        $this->Population = $Population;
    }

    function setLifeExpectancy($LifeExpectancy) {
        $this->LifeExpectancy = $LifeExpectancy;
    }

    function setCapital($Capital) {
        $this->Capital = $Capital;
    }
    
}
