<?php
function getMyDateTime() {
     // 2018-10-30 15:35
    return date('Y-m-d H:i');
  }
  
function getIP() {

    // 127.0.0.1 = localhost IP4
    // ::1       = localhost IP6
    
    $share=filter_input(INPUT_SERVER,'HTTP_CLIENT_IP');
    $proxy=filter_input(INPUT_SERVER,'HTTP_X_FORWARDED_FOR');
    $remote=filter_input(INPUT_SERVER,'REMOTE_ADDR');
    
    //whether ip is from share internet  
    if ($share!=NULL)   
     {
         $ip_address = $share;
     }
    //whether ip is from proxy
    elseif ($proxy!=NULL)  
    {
        $ip_address = $proxy;
    }
    //whether ip is from remote address
     else
        {
            $ip_address = $remote;
        }
       
        return $ip_address;
  }

function getBrowser() {
    $browser = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
    $retBrowser="";
   // var_dump($browser);
    if (strpos($browser, 'Firefox') !== false)
    {
      $retBrowser='Firefox';
    }
    elseif (strpos($browser, 'Edge') !== false)
    {
        $retBrowser='Edge';
    }
    elseif (strpos($browser, 'Chrome') !== false)
    {
        $retBrowser='Chrome';
    }  
    else
    {
        $retBrowser= 'other';
    }
    return $retBrowser;
  }
 
function getLanguage() {
    
    //var_dump($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $Lang='';
    $httpLang= filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');
     if ($httpLang)
     {
          $Lang = substr ($httpLang, 0, 2);
     }
      return $Lang; 
  }

function saveLog($dateTime, $ip, $browser, $lang) 
 {
    // http://php.net/manual/en/function.file-put-contents.php
      
    $line = "$dateTime|$ip|$browser|$lang|\n";
    file_put_contents("log.txt", $line, FILE_APPEND|LOCK_EX);
  }