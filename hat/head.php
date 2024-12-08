
<?php
    session_start();

    //Függvények
    function kijelentkezes()
    {
        unset($_SESSION["nev"]); // kitöröli a nevet 

        session_destroy(); //munka menet megszüntetése, kijelentkezés esetében használjuk
        header("Location: belep.php"); // ???
    }
    function fooldalra()
    {
        if (!isset($_SESSION["nev"]))
        {
            header("Location: belep.php");
        }
    }
    function kepfeltoltes($kepnev,$kepar){
        if (!file_exists('images')) // ez mit jelenet?
        {
            mkdir('images',0777,true); // 077 jelent valamit?
        }

        $maxsize= 5*1024*1024;
        $celkonyvtar="images/";
        $celfajl =$celkonyvtar.$_FILES["kepfajl"]["name"];
        
        $uploadOk=1;
        $kepext=strtolower(pathinfo($celfajl,PATHINFO_EXTENSION)); // --> jpg  így akár nagy betűs jpg is lehet 
            //Ellenőrzés: valóban kép-e (függetlenül a kiterjesztéstől)
        if (getimagesize($_FILES["kepfajl"]["tmp_name"])===false) // csak is a false értéket fogadja el pl a 0 értéket nem
        {
            $uploadOk=0;
        }
        else{
            $uploadOk=1;
        }
        if ($_FILES["kepfajl"]["size"]>$maxsize)
        {
            $uploadOk=0;
        }
        if ($kepext!="jpg" && $kepext!="png")
        {

            echo"Csak jpg vagy png tölthető fel.";
            $uploadOk=0;
        }
        if ($uploadOk==0)
        {
            $_SESSION["hiba"]= "Képformátum nem megfelelő";
        }
        else{
            if(move_uploaded_file($_FILES["kepfajl"]["tmp_name"],$celfajl)==true)
            {
                $_SESSION["kep"][]=$celfajl; // Mulit dimenzós tömb
                $_SESSION["kepnev"][]=$kepnev;
                $_SESSION["ar"][]=$kepar;
                echo "Sikeres képfeltöltés: ".$_FILES["kepfajl"]["name"];
            }
            else
            {  
                $_SESSION["hiba"]="Hiba képfeltöltés közben";
            }
        }


    } 
    
    //Űrlapok feldogozásai
    if ($_SERVER["REQUEST_METHOD"]=="POST"){ // Azt vizsgálja a SERVER globális változó a "REQUEST_METHOD"-al, hogy érkezett-e bármilyen form  POST methódussal.
        //Belépési form vizsgálata
        if (isset($_POST["pass"]) && $_POST["pass"]=="alma"){
                $_SESSION["nev"]= $_POST["nev"];
                header("Location: kepfeltolt.php");
                die("Nem sikerült az átiránytás..");
        }
        //Kijelentkezési "gomb" vizsgálata
        if (isset($_POST["exit"]) && $_POST["exit"]==1){
            kijelentkezes();
        }
        //Képfeltöltés űrlap vizsgálat
        if (isset($_POST["kepnev"]))
        {
            kepfeltoltes($_POST["kepnev"],$_POST["kepar"]);
        }
        //Vásárlás űrlap vizsgálata
        if (isset($_POST["db"]))
        {
            $vegosszeg =0;

            foreach ($_POST["db"] as $key => $value) {
                if ($_POST["db"][$key]>0)
                $vegosszeg+=$value*$_POST["ar"][$key];
            }
            $_SESSION["fizetendo"]=$vegosszeg;
            header('Location: kosar.php');
            die();
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>