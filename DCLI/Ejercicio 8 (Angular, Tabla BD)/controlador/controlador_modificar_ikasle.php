
<?php
require_once '../modelo/modelo_ikasle.php';
 
$datos =json_decode($_GET['value']);
$id=$datos->id;
$nombre= $datos->nombre;
$apellido1= $datos->apellido1;
$apellido2= $datos->apellido2;
$ciclo=$datos->ciclo;
$Curso= $datos->Curso;
$id_ziklo=$datos->id_ziklo; 
$cont = new modelo_ikasle();
$cont->setId($id);
$cont->setNombre($nombre);
$cont->setApellido1($apellido1);
$cont->setApellido2($apellido2);
$cont->setCurso($Curso); 
$cont->setCiclo($ciclo);
$cont->setId_ziklo($id_ziklo);
$cont->update();
print($nombre)


?>