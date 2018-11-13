<?php

$usuario = filter_input(INPUT_POST,'usuario');
$recuerdame = filter_input(INPUT_POST,'recordar');


if ($recuerdame =='on'){

    setcookie("usuario",$usuario,time()+7200,"/");
}


header("Location: ../index.php");








