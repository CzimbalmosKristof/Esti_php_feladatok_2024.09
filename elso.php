<?php
echo "Első valami"; // Megjegyzés ugyan úgy lehet 
                    /* Több soros megjegyzés  */
echo"<br> Második valami <br>"; // A html kód miatt felismeri <br> sortörést
$valtozo = 12;  // Nem típusos nyelv, nem kell dekralálni. Az az nem kell megadni a változó típusát.
                // Definiálás amikor csak a változót határozon meg, dekralálás alkalmával értéket is adunk neki.                 
echo $valtozo; // kis és nagybetűnek van jelentőségük 
echo "<br>";
$valtozo="banán";
echo $valtozo;
echo "<br>";
var_dump($valtozo." a banán változó  értéke");
echo "<br>";
echo "$valtozo a banán értéke echo-val";
echo "<br>";
// echo phpinfo(); PHP és webszerver beállítások lekérdezése
define("KONSTANS","ez az érték"); /*
 A böngészönek van egy saját memóriája és ezzel a Konstans értékkel elmentjük ezt az adatot. 
 define("KONSTANS" ez lesz a változó neve, a következő sor lesz a váltózó érétke pl;v20240911 )*/
echo KONSTANS;
define("VER","v20240911");
echo"nyito.ccss?".VER;
echo "<br>";
$tomb = array("alma","körte","banán");
echo $tomb[0];

foreach ($tomb as $egyelem) {
    echo "<br>$egyelem";
}
echo "<br>";
var_dump($tomb);
// Tömb elemének tölése
unset($tomb[1]);
echo "<br>";
var_dump($tomb);
// asszociatív tömb
$atomb=array("gyumi" => "alma", "auto"=> "opel"); // Ne sorszáma van hanem értéke olyan mint a szótár 
echo "<br>"; 
echo $atomb ["auto"];
echo "<br>";
foreach($atomb as $kulcs => $egyelem){
    echo "$kulcs : $egyelem<br>";
}


// szuper globális változó
echo $_SERVER["SERVER_NAME"];
echo "<br>";
echo $_GET["nev"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "<b>";?> Ez a HTML rész.</br>
    
</body>
</html>