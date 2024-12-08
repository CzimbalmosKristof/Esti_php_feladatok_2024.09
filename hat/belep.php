<?php
    include("head.php");
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belep</title>
</head>
<body>
    <?php 
    if (!isset($_SESSION["nev"]))
    { ?>
    <form action="#" method="POST">
        <h2>Kérlek töltsd ki a következő mezőket</h2>
        Név: <input type="text" name="nev"><br/>
        Jelszó: <input type="password" name="pass"><br/>
        <button type="submit">Belépés</button>
    </form>
    <?php 
    }
    else{ ?>
    <br>
    <form method="POST" action="#">
    <input type="hidden" name="exit" value="1">
    <button type="submit">Kijelentkezés</button>
    </form>
    <?php } ?>
    </body>
    </html>