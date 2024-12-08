<?php
    include("head.php")

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék lista</title>
</head>
<body>
    <?php 
    if (!isset($_SESSION["nev"]))
    { 
        header('Loaction: belep.php');
        die();
    } else { 
        
        echo 'válasz terméket'. $_SESSION["nev"].'!<br>';
        echo '<form method="POST" action="#">';
        foreach ($_SESSION["kep"] as $key => $value) {
            echo '<img style="width: 300px;" src="'.$value.'"><br>';
            echo $_SESSION["kepnev"][$key]; 
            echo ' : ';
            echo $_SESSION["ar"][$key];
            echo '<input type="hidden" name="ar[]" value="'.$_SESSION["ar"][$key].'">';
            echo '<input type="number" name="db[]"><br>';
            

        }        
        echo '<button type="submit">kosároz</button>';
        echo '</form>';
        
        ?>

    <form method="POST" action="#">
        <input type="hidden" name="exit" value="1">
        <button type="submit">Kijelentkezés</button>
    </form>
        <?php } ?>
    </body>
    </html>