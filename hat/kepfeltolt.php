<?php
    include("head.php"); // mindig rá kell hivatkozni

    fooldalra();
?>
   <h1> <?php echo "üdv ".$_SESSION["nev"] ?> </h1>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Képfeltöltés</title>
</head>
<body>
<h1>Képfeltöltés</h1>
<form action="#" method="POST" enctype="multipart/form-data">
    Válasz egy képet a feltöltése:
    <input type="file" name="kepfajl"><br>
    <input type="text" name="kepnev"><br>
    <input type="number" name="kepar"><br>
    <input type="submit" value="Kép feltöltése"><br>

</form>
<?php

    $kepeklista=glob("images/*");

    foreach ($kepeklista as $egykep)
    {
        echo '<img style="width: 300px;" src="'.$egykep.'"><br>';
    }

?>


<form action="#" method="POST" >
    <input type="hidden" name="exit" value="1">
    <button type="submit">Kijelentkezés</button>
</form>
</body>
</html>