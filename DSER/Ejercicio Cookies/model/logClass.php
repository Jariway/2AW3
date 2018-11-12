<?php

class logClass {
    protected $idLog;
    protected $idCookie;
    protected $log;
    
    function getIdLog() {
        return $this->idLog;
    }

   
    function getLog() {
        return $this->log;
    }

    function setIdLog($idLog) {
        $this->idLog = $idLog;
    }
  
    function setLog($log) {
        $this->log = $log;
    }
    function getIdCookie() {
        return $this->idCookie;
    }

    function setIdCookie($idCookie) {
        $this->idCookie = $idCookie;
    }   
}
