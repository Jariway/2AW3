
 <?php

require_once '../modelo/modelo_Ikasle.php';
$ikasle_array =json_decode($_GET['value']);

$nombre=$ikasle_array->nombre;
$apellido1=$ikasle_array->apellido1;
$apellido2=$ikasle_array->apellido2;

$curso= $ikasle_array->Curso;
$ciclo=$ikasle_array->ciclo; 
$id_ziklo=$ikasle_array->id_ziklo; 

$cont = new modelo_ikasle();
$cont->setNombre($nombre);
$cont->setApellido1($apellido1);
$cont->setApellido2($apellido2);

$cont->setCurso($curso);
$cont->setCiclo($ciclo);
$cont->setId_ziklo($id_ziklo);
$cont->insert();

unset($cont);

//necesito el id del último alumno insertado

?>