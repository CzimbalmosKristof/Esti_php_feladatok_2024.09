<?php
    session_start();
    require("config.php");

    if(!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"])
    {
        die("Nincs hozzáférése az oldalhoz");
    }

    if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["userid"])){

        $userid=$_POST["userid"];

        $st=$con->prepare("UPDATE users SEt status=1 Where id=?");
        $st->bind_param("i",$userid);

        if($st->execute())
        {
            echo "hiba történt: ".$st->error;
        }
        $st->close();
    }

    echo "<h2> Inaktív felhasználók</h2>";
    $res=$con->query("Select * FROM  users WHERE status= FALSE");

    if($res->num_rows >0)
    {
        while($row=$res->fetch_object())
        {
            echo $row->name." : ".$row->email."<br>";
            echo "<form method='POST'>
                <input type='hidden' name='userid' value=".$row->id.">
                <button type'submit'>Jóváhagyás</button>
                </form><br>
                ";
        }
    }
    else{
        echo"Nincs jóváhagyásra váró felhasználó.";
    }
    ?>