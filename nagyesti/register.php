<?php

    session_start();
    require("config.php");

    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT); /

        $st = $con->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        $st->bind_param("sss",$name,$email,$password);

        if ($st->execute())
        {
            echo "Regisztráció sikeres: ".$name;
        }
        else
        {
            echo "Sikertelen regisztráció: ".$st->error;
        }
        $st->close();
    }

?>