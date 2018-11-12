<?php

include_once '../model/myClases.php';

$cookie = filter_input(INPUT_COOKIE, 'id');

if ($cookie == null) {
    $newCookie = new cookieModel();
    setcookie("id", $newCookie->getNewCookie(), 2147483647, "/"); // year 2038
    // load a default image if there were no cookies found
    $imageUrl = 'https://www.roastbrief.com.mx/wp-content/uploads/2015/03/Collage-Marcas.png';
} else {
    //echo $cookie;
    $cLog = new logModel();
    $cLog->setIdCookie($cookie);
    $cLog->setListLogsForCookie();  // load all the logs for the current cookie
    $listLogs = $cLog->getList();  // load in $listlogs a list of log objects
    //var_dump($listLogs);
    if ($listLogs != NULL) {  // if we get logs for the cookie
        $lastLog = end($listLogs); // get only the last log from the list
        // var_dump($lastLog);
        $strLog = $lastLog->getLog();  // here we get for example: '2018-10-31 14:07 | ::1 | Firefox | es | television'
        $exploded = explode("|", $strLog); // explode converrts the string in an array
        $searchedTerm = $exploded[4]; // 0--> 2018-10-31 14:07 | 1-->  ::1 | 2-->  Firefox | 3--> es | 4--> television
        $cImage = new imageModel();
        $imageUrl = $cImage->getImageUrl($searchedTerm); // get the url for the ad
    } else {
         // load a default image if there are no searches for the current cookie
        $imageUrl = 'http://guiadecazorlayubeda.com/sites/default/files/publicidad.jpg';
    }
}
      
         
   
  


