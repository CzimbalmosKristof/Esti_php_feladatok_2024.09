<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nagy Esti Feladat</title>
</head>
<body>
    <h2>Regisztráció</h2>
    <form  method="POST" action="register.php">
        Név: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Jelszó: <input type="password" name="password" required><br>
        <button type="submit">Regisztráció</button>
    </form>

    <h2>Bejelentkezés</h2>
    <form  method="POST" action="login.php">
        Email: <input type="email" name="email" required><br>
        Jelszó: <input type="password" name="password" required><br>
        <button type="submit">Bejelentkezés</button>
    </form>

    <?php
        if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):
    ?>
        <a href="adminusers.php"> felhasználók jóváhagyásra</a><br>
    <?php endif; ?>
    <?php
        if (isset($_SESSION["userid"])):
    ?>
    <a href="listusers.php">felhasználók listázása</a><br>
    <a href="logout.php">kijelentkezés</a><br>
    <?php endif; ?>
            
</body>
</html>