<?php
//namespace model;
class ziklo_class
{
    protected $id_ziklo;
    protected $izen_ziklo;
    protected $familia_ziklo;
    
   
    
    function getId() {
        return $this->id_ziklo;
    }

    function getIzena() {
        return $this->izen_ziklo;
    }
function getFamilia() {
        return $this->familia_ziklo;
    }

    function setId($id_ziklo) {
        $this->id_ziklo = $id_ziklo;
    }

    function setIzena($izen_ziklo) {
        $this->izen_ziklo = $izen_ziklo;
    }

function setFamilia($familia_ziklo) {
        $this->familia_ziklo = $familia_ziklo;
    }


   
}

