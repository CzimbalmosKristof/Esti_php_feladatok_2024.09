<?php 

if (isset($_POST["pass"]) && $_POST["pass"]=="alma")
{
    setcookie("belepve","1");
}

if (isset($_POST["kilepform"]) && $_POST["kilepform"]==1){
    unset($_COOKIE["belepve"]);
    setcookie("belepve","",-1);
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belépős süti, munkamenet</title>
</head>
<body>
    <?php
    
       if (!isset($_COOKIE["belepve"]) || $_COOKIE["belepve"]!=1)
       {
        ?>
    <form action="#" method="POST">
        Név: <input type="text" name="nev"><br>
        Jelszó: <input type="password" name="pass"><br/>
        <button type="submit">Belépés</button>
    </form>
    <?php
       }
       else
       {
        echo "<h2>Üdvözöllek ". $_POST["nev"]."</h2>";
        ?>
        <form action="#" method="POST">
        <input type="hidden" name="kilepform" value="1">
        <button type="submit">Kilépés</button>
        <?php
       }
        ?>
    </form>
</body>
</html>