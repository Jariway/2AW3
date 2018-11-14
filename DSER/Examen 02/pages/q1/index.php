<?php
include_once '../../model/conexion.php';
include_once '../../functions/myFunctions.php';
include_once 'index.html.php';

// Crear sesión

$idioma = getLanguage();
session_start();
$_SESSION['idioma'] = $idioma;
?>