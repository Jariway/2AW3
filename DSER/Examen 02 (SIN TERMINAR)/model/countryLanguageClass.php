<?php

class countryLanguageClass {
   protected $CountryCode;
   protected $Language;
   protected $IsOfficial;
   protected $Percentage;
   
   function getCountryCode() {
       return $this->CountryCode;
   }

   function getLanguage() {
       return $this->Language;
   }

   function getIsOfficial() {
       return $this->IsOfficial;
   }

   function getPercentage() {
       return $this->Percentage;
   }

   function setCountryCode($CountryCode) {
       $this->CountryCode = $CountryCode;
   }

   function setLanguage($Language) {
       $this->Language = $Language;
   }

   function setIsOfficial($IsOfficial) {
       $this->IsOfficial = $IsOfficial;
   }

   function setPercentage($Percentage) {
       $this->Percentage = $Percentage;
   }
  
   
}
