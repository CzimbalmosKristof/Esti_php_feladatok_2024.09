<?php 
    session_start();
    require("config.php");
    
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email=$_POST["email"];
        $password=$_POST["password"];
    
        $st=$con->prepare("SELECT id,password,status,is_admin FROM users WHERE email=?");

        $st->bind_param("s",$email);
        $st->execute();
        $st->bind_result($id,$hash,$status,$isadmin);
        $st->fetch();


        if($hash && password_verify($password,$hash))
        {
            if ($status){
                $_SESSION["userid"]=$id;
                $_SESSION["is_admin"]=$isadmin;
                header('Location: index.php');
            }
            else{
                echo "fiókját nem aktiválta az admin";
            }
        }
        else{
            echo "Nem megfelelp email/jelszó nem található";
            }
            $st->close();


    
    
    } 