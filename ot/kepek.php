<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    function vizjelezes($fajl,$kit)
    {
        if ($kit=="jpg")
        {
            $kep=imagecreatefromjpeg($fajl);
        }
        else
        {
            $kep=imagecreatefrompng($fajl);
        }
        $kepszel= imagesx($kep); //Kép szélessége pixelben
        $kepmag= imagesy($kep); //Kép magassága pixelben
        $vizjel="Esti";

        //Szöveg pozicíója jobb alsó sarokban
        $vizjel_x=$kepszel-50;//
        $vizjel_y=$kepmag-50;//
        
        //szöveg beállítása: szín, nagyság stb.
        $szoveg_szin =imagecolorallocate($kep,0,0,0);
        
        imagestring($kep,5,$vizjel_x,$vizjel_y,$vizjel,$szoveg_szin);

        if($kit=="jpg")
        {
            imagejpeg($kep,$fajl,75);
        }
        else
        {
            imagepng($kep,$fajl,6);
        }
        imagedestroy($kep);

        return $fajl;
        
    }


    //var_dump($_FILES["kepfajl"]);
    $maxmeret = 1024*1024; // 1*1024 ez egy KiloByte 1024*1024 ez egy Megabyte
    $celkonyvtar="images/";
    $egydinev=uniqid();
    $celfajl =$celkonyvtar.$_FILES["kepfajl"]["name"];
    //images/napsutes.jpg
    $uploadOk=1;
    $kepkiterjesztes=strtolower(pathinfo($celfajl,PATHINFO_EXTENSION)); // --> jpg  így akár nagy betűs jpg is lehet 
    
    $egydinev=uniqid().".".$kepkiterjesztes;
    $celfajl=$celkonyvtar.$egydinev;

    //Ellenőrzés: valóban kép-e (függetlenül a kiterjesztéstől)
    if (getimagesize($_FILES["kepfajl"]["tmp_name"])==true)
    {
        echo "Az állomány egy kép.";
    }
    else{
        echo "Nem kép";
        $uploadOk=0;
    }
    //Ellenőrzés: engedélyezett kkiterjesztés van-e pl: jpg, png
    if ($_FILES["kepfajl"]["size"]>$maxmeret)
    {
        echo "Túl nagy kép";
        $uploadOk=0;
    }

    if ($kepkiterjesztes!="jpg" && $kepkiterjesztes!="png"){

        echo"Csak jpg vagy png tölthető fel.";
        $uploadOk=0;
    }

    if ($uploadOk==0)
    {
        echo "A képfeltöltés sikertelen...";
    }
    else{
        if(move_uploaded_file($_FILES["kepfajl"]["tmp_name"],$celfajl)==true)
        {
            vizjelezes($celfajl,$kepkiterjesztes);
            $feltoltott=$celfajl;
            echo "Sikeres képfeltöltés: ".$_FILES["kepfajl"]["name"];
        }
        else
        {
            echo "Hiba történt feltöltés közben";
        }
    }


}


?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Képek feltöltése és kezelése</title>
</head>
<body>
<h1> Képek feltöltése és kezelése </h1>
<form action="kepek.php" method="POST" enctype="multipart/form-data">
    Válasz egy képet a feltöltése:
    <input type="file" name="kepfajl">
    <input type="submit" value="Kép feltöltése">
</form> 
<?php
    if (isset($feltoltott))
    {
    ?>
        <img src="<?php echo $feltoltott; ?>">
    <?php
    }
    ?>
</body>
</html>