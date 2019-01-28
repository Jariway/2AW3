<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Kontaktuak</h1>
<br>
<form method="post" action="aldatu">
    <select name="aukera" id="">
    <?php
    foreach ($kontaktuak as $kontaktua){
        echo ("<option value='$kontaktua->id'>$kontaktua->name</option>");
    }
    ?>
    
    </select>
    <input type="submit" value="Aldatu">
    </form>
</body>
</html>