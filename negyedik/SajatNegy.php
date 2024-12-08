<?php
if (isset($_POST["jel"]) && $_POST["jel"]=="jelszo")
{
    setcookie("belepve",$_POST["jel"])
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Negyedik</title>
</head>
<body>

<div>
<form method="POST" action="#" >

        Név: <input type="text" name="nev" ><br>
        Jelszó: <input type="text" name="jel" ><br>
        <button type="submit">Beküld</button>

    
    <?php
    if (($_POST['nev']=='alma') && isset($_POST['jel']=='jelszo')){
    ?>
        Név: <input type="text" name="nev" ><br>
        Jelszó: <input type="text" name="jel" ><br>
        <button type="submit">Beküld</button>
    <?php
    else{

    }
    ?>

 <!--       if (($_POST['nev']=="alma") && ($_POST['jel']=="jelszo"))
        {
            setsetcookie("jelszo",$_POST['jel']);
            echo"sikerül";
            $helyes=True;
        }else{
            echo"nem sikerül";
            $helyes=False;
        }    
    }
-->
  
</form>
</div>
</body>
</html>