<?php

class logs_class {


protected $idLogs;
protected $idUser;
protected $Fecha;
protected $Ip;
protected $Navegador;
protected $Idioma;
protected $Busqueda;



	public function getIdLogs(){
		return $this->idLogs;
	}

	public function setIdLogs($idLogs){
		$this->idLogs = $idLogs;
	}

	public function getIdUser(){
		return $this->idUser;
	}

	public function setIdUser($idUser){
		$this->idUser = $idUser;
	}

	public function getFecha(){
		return $this->Fecha;
	}

	public function setFecha($Fecha){
		$this->Fecha = $Fecha;
	}

	public function getIp(){
		return $this->Ip;
	}

	public function setIp($Ip){
		$this->Ip = $Ip;
	}

	public function getNavegador(){
		return $this->Navegador;
	}

	public function setNavegador($Navegador){
		$this->Navegador = $Navegador;
	}

	public function getIdioma(){
		return $this->Idioma;
	}

	public function setIdioma($Idioma){
		$this->Idioma = $Idioma;
	}

	public function getBusqueda(){
		return $this->Busqueda;
	}

	public function setBusqueda($Busqueda){
		$this->Busqueda = $Busqueda;
	}






}
?>