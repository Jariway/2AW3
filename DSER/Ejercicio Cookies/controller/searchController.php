<?php
include_once './functions/myFunctions.php';  
include_once '../model/myClases.php';

$dateTime=getMyDateTime();
$ip=getIP();
$browser=getBrowser(); 
$lang=getLanguage();
$term= filter_input(INPUT_GET, 'inSearch');
$idCookie= filter_input(INPUT_COOKIE, 'id');
var_dump($idCookie);
if ($idCookie!=NULL)
{
    $logString= "$dateTime | $ip | $browser | $lang | $term";
    //echo $logString;
    $cLog=new logModel();
    $cLog->setIdCookie($idCookie);
    $cLog->setLog($logString);
    $cLog->addLog();
    
    header("Location: https://www.google.com/search?q=$term");
}













