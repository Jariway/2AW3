
<?php 

include_once("../modelo/modelo_ziklo.php");
$cont=new modelo_ziklo();
$cont->setList();

$datos=$cont->getJSONList();
unset($cont);


$zikloak= json_encode($datos); 
 echo($zikloak);
  

?>

