<?php

class cityClass {
    protected $ID;
    protected $Name;
    protected $CountryCode;
    protected $Population;
    
    
    function getID() {
        return $this->ID;
    }

    function getName() {
        return $this->Name;
    }

    function getCountryCode() {
        return $this->CountryCode;
    }

    function getPopulation() {
        return $this->Population;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setName($Name) {
        $this->Name = $Name;
    }

    function setCountryCode($CountryCode) {
        $this->CountryCode = $CountryCode;
    }

    function setPopulation($Population) {
        $this->Population = $Population;
    }

   
    
}
