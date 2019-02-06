
<?php 

include_once("../modelo/modelo_Ikasle.php");
$cont=new modelo_ikasle();
$cont->setList_ikasle_ziklo();

$datos=$cont->getList_ikasle_ziklo();
unset($cont);


$ikasleak= json_encode($datos); 
 echo($ikasleak);
  // print $ikasleak;  

?>

