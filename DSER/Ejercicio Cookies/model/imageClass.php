<?php

class imageClass {
    protected $idImage;
    protected $url;
    protected $key;
    
    
    function getIdImage() {
        return $this->idImage;
    }

    function getUrl() {
        return $this->url;
    }

    function getKey() {
        return $this->key;
    }

    function setIdImage($idImage) {
        $this->idImage = $idImage;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setKey($key) {
        $this->key = $key;
    }


    
}
