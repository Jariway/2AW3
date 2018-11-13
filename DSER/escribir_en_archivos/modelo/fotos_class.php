<?php


class fotos_class{

protected $Url;
protected $Nombre;


	public function getUrl(){
		return $this->Url;
	}

	public function setUrl($Url){
		$this->Url = $Url;
	}

	public function getNombre(){
		return $this->Nombre;
	}

	public function setNombre($Nombre){
		$this->Nombre = $Nombre;
	}
}
?>