<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Make changes and press submit</h1>
    <br>
    <br>
    <form action="changeUser" method="post">
    <input type="hidden" value="<?php echo $contactInfo->id ?>" name="userId">
    ID: <input type="text" disabled value="<?php echo $contactInfo->id ?>" id=""><br>
    Name: <input type="text" name="izena" value="<?php echo $contactInfo->name ?>" id=""><br>
    surname: <input type="text" name="abizena" value="<?php echo $contactInfo->surname ?>" id=""><br>
    Tel: <input type="text" name="telefonoa" value="<?php echo $contactInfo->tel ?>" id=""><br>
    Emails:

    <?php
if (isset($contactEmails[0])) {
    $email = $contactEmails[0]->email;
    $id = $contactEmails[0]->id;
    echo ("<input type='text' name='email1' value='$email' id=''> <br>");
    echo ("<input type='hidden' name='idEmail1' value='$id'>");
} else {
    echo ("<input type='text' name='email1berria' value='' id=''><br>");
}
if (isset($contactEmails[1])) {
    $email = $contactEmails[1]->email;
    $id = $contactEmails[1]->id;

    echo ("<input type='text' name='email2' value='$email' id=''><br>");
    echo ("<input type='hidden' name='idEmail2' value='$id'>");
} else {
    echo ("<input type='text' name='email2berria' value='' id=''><br>");
}
if (isset($contactEmails[2])) {
    $email = $contactEmails[2]->email;
    $id = $contactEmails[2]->id;

    echo ("<input type='text' name='email3' value='$email' id=''><br>");
    echo ("<input type='hidden' name='idEmail3' value='$id'>");
} else {
    echo ("<input type='text' name='email3berria' value='' id=''><br>");
}
?>

    <br>
    <h3>Groups</h3>
    <br>

    <?php
foreach ($allGroups as $group) {
    $aurkituta = false;
    foreach ($contactGroups as $contactGroup) {
        if ($contactGroup->idGroup == $group->id) {
            $aurkituta = true;
            echo ("$group->name: <input type='checkbox' value='$group->id' name='checkaukera[]' id='$group->id' checked><br>");

        }
    }
    if ($aurkituta == false) {
        echo ("$group->name: <input type='checkbox' value='$group->id' name='checkaukera[]' id='$group->id'><br>");
    }
}
?>
    <br>
    <input type="submit" value="aldatu">
    </form>
    <br>
    <?php
    var_dump($contactInfo);
    var_dump($contactEmails);
    var_dump($contactGroups);

    ?>
</body>
</html>

