<?php
//namespace model;
class ikasle_class
{
    protected $id;
    protected $Nombre;
    protected $Apellido1;
    protected $Apellido2;
    protected $Edad;
    protected $Ciclo;
    protected $Curso;
    protected $id_ziklo;
   
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->Nombre;
    }
function getApellido1() {
        return $this->Apellido1;
    }
function getApellido2() {
        return $this->Apellido2;
    }
 function getEdad() {
        return $this->Edad;
    }
    function getCiclo() {
        return $this->Ciclo;
    }

    function getCurso() {
        return $this->Curso;
    }
    function getId_ziklo() {
        return $this->id_ziklo;
    }


    function setId($id) {
        $this->id = $id;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

function setApellido1($Apellido1) {
        $this->Apellido1 = $Apellido1;
    }

function setApellido2($Apellido2) {
        $this->Apellido2 = $Apellido2;
    }
 function setEdad($Edad) {
        $this->Ciclo = $Edad;
    }
    function setCiclo($Ciclo) {
        $this->Ciclo = $Ciclo;
    }

    function setCurso($Curso) {
        $this->Curso= $Curso;
    }  
   function setId_ziklo($id_ziklo) {
        $this->id_ziklo= $id_ziklo;
    }  
}

