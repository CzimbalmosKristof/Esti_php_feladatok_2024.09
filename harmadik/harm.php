<?php
/*Létrehozandó egy form, amely POST metódussal kezeli az űrlapot, amely egy kétszemélyes játékot valósít meg. Kezdetben egy beviteli mezőben egy szót kell megadni, amely nem tartalmaz ékezeteket, valamint betű ismétlést. (Pl: alvo, lakos, pohar)

Ellenőrzéskor - amennyiben szóközt tartalmaz - vissza kell dobni hibaüzenettel. Az ékezet meglétét nem szükséges ellenőrizni.

Ha megfelelő az első játékos által megadott szó, akkor a második játékos veszi át a szerepet, szintén beviteli mezőben tippelnie szükséges egy betűre.

A tippelt betű vizsgálatakor ki kell írni, hogy az a betű szerepel-e az eredeti szóban, illetve azt is, hogy melyik karakterhelyen.
*/
$error="";
if (isset($_COOKIE["szo"]))
    $vanszo= true;
else
    $vanszo= false;

//shorthand if
//    $vanszo=isset($_COOKIE["szo"]) ? true :false;
// Még egyszerűbb
 //   $vanszo=isset($_COOKIE["szo"]);
    $betumsg="";

if (isset($_POST["szo"]) && strlen($_POST["szo"])>1) /*(isset($_POST["szo"]) ez azt vizsgálja  hogy post methodusban van-e szo beviteli mező.strlen($_POST["szo"])>1 peidg megadja a szo beviteli mező hosszát */ 
{
    $vanszokoz = strpos($_POST["szo"],' '); /*A $vanszokoz = strpos($_POST["szo"],' ' megadja hogy hanyadik értéken van a szó köz, ha nincs akkor false értéket add*/ 
    if ($vanszokoz!==false)
    {
        $error = "A szóköz nem megengedett!";
    }
    else
    {
        $vanszo= true;
        setcookie ("szo",$_POST["szo"]); /* A süti eltárolja a bevitt szót*/ 
        $mostszo="";
        for ($i=0; $i <strlen($_POST["szo"]) ; $i++) { 
            $mostszo.="_";
        }
        setcookie("most",$mostszo);
    }
}
if (isset($_COOKIE["szo"]) && (isset($_POST["betu"]) ))
{
    $vanebetu = strpos ($_COOKIE["szo"],$_POST["betu"]);
    
    if ($vanebetu!==false){
        $betumsg="Szerepel a(z) $vanebetu. helyen";
    }
    else {
        $betumsg="Nem szerepel a magadott betű";
    }
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitalálós</title>
</head>
<body>

    <span style="color: red;">
        <?php echo $error; ?>
    </span>
    <span style="color: green;">
        <?php echo $betumsg; ?>
    </span>
    
    <form method="POST" action="#"> <!-- # azt jelenti hogy marad az oldaon-->
        <?php 
            if ($vanszo==false) {
        ?>
        Kérem az szót: <input type="text" name="szo" ><br> <!-- Ez a html tag azért kellett hogy kiírja -->
        <?php } 
            else{
        ?>
        Kérem a betűt: <input type="text" name="betu" ><br>
        <?php } ?>
            <button type="submit">Beküld</button>
        <h3>
            <?php
                if($vanszo!=false &&  isset($_COOKIE["szo"]))
                {
                    if ($vanebetu!==false){
                    $_COOKIE["most"][$vanebetu] = $_POST["betu"];
                    }
                    echo $_COOKIE["most"];
                    setcookie("most",$_COOKIE["most"]);
                }
                
            ?>
        </h3>
        
        </form>
</body>
</html>