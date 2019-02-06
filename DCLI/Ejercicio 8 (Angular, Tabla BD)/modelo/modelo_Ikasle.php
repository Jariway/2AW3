<?php

include_once ('../controlador/conector.php');
include_once ('ikasle_class.php');
class modelo_ikasle extends ikasle_class
  {
    private $link;
    private $list;

 private $JSONList=array();
 private $List_ikasle_ziklo=array();
 public function getList() {
        return $this->list;
    }
 public function getList_ikasle_ziklo() {
        return $this->List_ikasle_ziklo;
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
$sql = "CALL sp_mostrar_ikasleak()";
$this->list = array();
$result = $this->link->query($sql);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $new=new self();
            $new->setId($row['id']);
            $new->setNombre($row['nombre']);
            $new->setApellido1($row['apellido1']);
            $new->setApellido2($row['apellido2']);
            $new->setEdad($row['edad']);
            $new->setCurso($row['Curso']);
            $new->setEdad($row['ciclo']);
             $new->setEdad($row['id_ziklo']);
            array_push($this->list, $new);  // array of objects
            array_push($this->JSONList,$row); //array of rows
 }
       mysqli_free_result($result); 
       
       $this->CloseConnect();

}
public function setList_ikasle_ziklo(){
/* obtiene todos los alumnos  */
$this->OpenConnect(); 
$sql = "CALL sp_consulta_ikasle_ziklo()";
$this->list = array();
$result = $this->link->query($sql);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            array_push($this->List_ikasle_ziklo,$row); //array of rows
 }
       mysqli_free_result($result); 
       
       $this->CloseConnect();

}

public function insert()
 {     
      $this->OpenConnect();  // konexio zabaldu  - abrir conexión     
      $nombre="'". $this->getNombre()."'";
       $apellido1= "'". $this->getApellido1()."'";
        $apellido2="'". $this->getApellido2()."'";
      
     $ciclo= "'". $this->getCiclo()."'";
      $curso= $this->getCurso();
       $id_ziklo= $this->getId_ziklo();
      $sql = "CALL sp_insertar_ikasle($nombre,$apellido1,$apellido2,$curso,$ciclo,$id_ziklo )";
     // echo $sql;
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
echo $this->getId();
      $sql="CALL sp_borrar_ikasle(".$this->getId().")";
       
 echo $sql;
$this->link->query($sql);
      $this->CloseConnect();
 }
public function update() {
      $this->OpenConnect();
      $id= $this->getId();
      $nombre="'". $this->getNombre()."'";
     $apellido1="'". $this->getApellido1()."'";
     $apellido2="'". $this->getApellido2()."'";
     $ciclo="'". $this->getCiclo()."'";
   
      $curso= $this->getCurso();
       $id_ziklo= $this->getId_ziklo();
      $sql="CALL sp_modificar_ikasle($id,$nombre,$apellido1,$apellido2,$curso,$ciclo,$id_ziklo)";
      $this->link->query($sql);
      $this->CloseConnect();
      //var_dump($sql);
 }

public function find_name() {
      $this->OpenConnect();
      //$id= $this->getId();
      $nombre="'". $this->getNombre()."'";
       $sql="CALL sp_buscar_ikasle($nombre)";
        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $this->id[] = $row;
        }
      $this->link->query($sql);
      $this->CloseConnect();
      //var_dump($sql);
 }



  
}

?>
