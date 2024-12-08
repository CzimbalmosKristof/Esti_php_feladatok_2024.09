<?php
    $latszodik=false;
    if (isset($_POST["kod"])  && $_POST["kod"]==5555){ //Létezik a változó az viszgálja az isset 
        $latszodik=true;
        $nev=$_POST["nev"];
        echo 'Bejelentkezve';
        }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bejelentkezés</h1>
    <from>
        <?php
        if ($latszodik==true)
        {
            require 'login.php';
            echo "<br>";
            
            if(isset($_POST["szoveg"]))
            {
                $szoveg =$_POST["szoveg"];
                echo " Az általad megadott szöveg: $szoveg <br>";
                echo " Az általad megadott szöveg hossza:".
                strlen($szoveg);
                echo "<br>";
                echo "nagybetűs szöveged: ".strtoupper($szoveg); // Nagy betűsre alakítja
                echo "<br>";
                $holvan =strpos($szoveg,$_POST["szoveg2"]);
                echo "Az alma helye: $holvan";
                echo "<br>";
                if($holvan!=false){
                    echo "Az alma helye: $holvan";
                }else echo "Nincs alma a szövegben";
                    echo "<br>";
            }
        }
        else{
         echo '<form method="POST" action="#"> 
            Név: <input type="text" name="nev"><br>
            Kód: <input type="number" name="kod" min="1111" max="9999" value="1111"><br>
            <button type="submit">Belépés</button>
            </from>';
        }
        ?>
        <?php
            //include 'labec.php';
            require_once 'lablec.php';
        ?>
</body> 
</html>