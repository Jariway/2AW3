<?php
class contact_class {
    private $id;
    private $name;
    private $surname;
    private $tlf;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;

    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;

    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname) {
        $this->surname = $surname;

    }

    public function getTlf() {
        return $this->tlf;
    }

    public function setTlf($tlf) {
        $this->tlf = $tlf;

    }
}
