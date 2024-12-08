<h3>Üdv neked <?php echo $nev; ?>!</h3>
<form method="POST" action="#">
    <input type="text" name="szoveg" title="Adj meg egy szöveget"><br>
    <input type="text" name="szoveg2" title="Adj meg egy keresendő szöveget"><br>
    <input type="hidden" name="kod" value="5555">
    <input type="hidden" name="nev" value="<?php echo $nev;?>">
    <button type="submit">Beküld</button>
</from>
<br>
<a href="masodik.php">Kijelentkezés</a>