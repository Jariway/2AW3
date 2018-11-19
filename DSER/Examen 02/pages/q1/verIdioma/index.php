<?php
session_start();

if ($_SESSION["idioma"] == "") {
    echo ("Hola");
    header("Location: ../../../index.html");
    die();
}

include_once 'index.html.php';
