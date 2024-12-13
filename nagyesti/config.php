<?php
    $host ="localhost";
    $dbname = "nagyesti";
    $dbuser = "root";
    $dbpass = "";

    $con = new mysqli($host,$dbuser,$dbpass,$dbname);

    if ($con->connect_error)
    {
        die("Adatbázis kapcsolódás sikertelen".$con->connect_error);

    }


?>