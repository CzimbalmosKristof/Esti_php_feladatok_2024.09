<?php
if (isset($_POST["nev"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["pass1"])){

    if ($_POST["pass"]==$_POST["pass1"]){
            
            setcookie("belepve","0");
            echo "A két jelszó egyezik.";
    }
        
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazi</title>
</head>
<body>
        <?php
        if (!isset($_COOKIE["belepve"]) || $_COOKIE["belepve"]==1)
        {
        ?>
        <form action="#" method="POST">
            <h2>Kérlek töltsd ki a következő mezőket</h2>
            Név: <input type="text" name="nev"><br/>
            Email cím: <input type="text" name="email"><br/>
            Jelszó: <input type="password" name="pass"><br/>
            Jelszó megerősítése: <input type="password" name="pass1"><br/>
            <button type="submit">Belépés</button>
        </form>
        <?php
        }
        else
        {
            echo "Sikeres belépés";
        ?>
        <form action="#" method="POST">
        fing <input type="hidden" name="kilepform" value="1"></br>
        fing<button type="submit">Kilépés</button></br>
        </form>
        <?php
        }
        ?>
        
    
    
</body>
</html>