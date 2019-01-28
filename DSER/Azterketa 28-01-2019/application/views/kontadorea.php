<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

$kontadoreaAriketa = $this->input->cookie('kontadorea');

if ($kontadoreaAriketa == 0) {
    ?>
    <h1>A session is active. Press logout to destroy the session.</h1>
    <br>
    <br>
    <p>Welcome!! This is your first visit.</p>

<br>

<a href="logout"><h2>Logout</h2></a>

 <?php

}else{?>
    <h1>A session is active. Press logout to destroy the session.</h1>
    <br>
    <br>
    <p>Number of visits: </p>
    
 <?php
 echo $kontadoreaAriketa;
}
$cookie = array(
    'name' => 'kontadorea',
    'value' => $kontadoreaAriketa+1,
    'expire' => '3700',
);
$this->input->set_cookie($cookie);

?>

</body>
</html>