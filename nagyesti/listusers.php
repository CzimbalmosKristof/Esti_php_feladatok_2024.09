<?php
    session_start();
    require("config.php");

    if (!isset($_SESSION["userid"])){
        die("Nincs hozzáférése az oldalhoz");
    }
    $res= $con->query("SELECT * FROM users WHERE status = true ");

    if($res->num_rows >0)
    {
        echo '<h2>Aktív felhasználók listája</h2>';
        while ($row=$res->fetch_object())
        {
            echo $row->name." : ".$row->email."(".$row->created_at.")<br>";
        }
    }
    else
    {
        echo "Nincs aktív felasználó";
    }


?>