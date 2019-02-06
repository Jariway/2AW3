<?php

include_once ('../controlador/conector.php');
include_once ('ziklo_class.php');
class modelo_ziklo extends ziklo_class
  {
    private $link;
    private $list;
 private $JSONList=array();

 public function getList() {
        return $this->list;
    }
public function getJSONList() {
        return $this->JSONList;
    }
 public function OpenConnect()
    {
    $konDat=new Conectar();
    try
    {
         $this->link=new mysqli($konDat->localhost,$konDat->usuario,$konDat->contrasena,$konDat->bbdd);
     }
    catch(Exception $e)
    {
    echo $e->getMessage();
    }
        $this->link->set_charset("utf8");  
      }

public function CloseConnect()
 {
      $this->link->close();
 }

public function setList(){
/* obtiene todos los alumnos  */
$this->OpenConnect(); 
$sql = "CALL sp_mostrar_zikloak()";
$this->list = array();
$result = $this->link->query($sql);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           
            array_push($this->JSONList,$row); //array of rows
 }
       mysqli_free_result($result); 
       
       $this->CloseConnect();

}

public function insert()
 {     
      $this->OpenConnect();  // konexio zabaldu  - abrir conexión     
      $nombre="'". $this->getIzena()."'";
      $familia= $this->getFamilia();
     
 
      $sql = "CALL sp_insertar_ziklo($nombre, $familia)";
      //echo $sql;
       $consulta =$this->link->query($sql);   
     
     while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->id[] = $row;
        }
        $consulta->free_result();
        $this->link->close();
        return $this->id;
 $this->CloseConnect();
 }


 public function delete()
 {
      $this->OpenConnect();
      $sql="CALL sp_borrar_ziklo(".$this->getId().")";
      echo $sql;
$this->link->query($sql);
      $this->CloseConnect();
 }
public function update() {
      $this->OpenConnect();
      $id= $this->getId();
      $nombre="'". $this->getIzena()."'";
      $familia= $this->getFamilia();
     
      
      $sql="CALL sp_modificar_ziklo($id,$izena,$familia)";
      $this->link->query($sql);
      $this->CloseConnect();
      //var_dump($sql);
 }

public function find_name() {
      $this->OpenConnect();
      //$id= $this->getId();
      $nombre="'". $this->getIzena()."'";
       $sql="CALL sp_buscar_ziklo($nombre)";
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->id[] = $row;
        }
      $this->link->query($sql);
      $this->CloseConnect();
      //var_dump($sql);
 }



 ?>