<?php
    include "connection.php";
    if(isset($_POST['username']) && ($_POST['wachtwoord']) && ($_POST['totale_uren_stage'])) {
        $username =  $_POST['username'];
        $password =  $_POST['wachtwoord'];
        $totale_uren_stage = $_POST['totale_uren_stage'];
        $user = "INSERT INTO `users`(username, wachtwoord, totale_uren_stage)
        VALUES ('$username', '$password', '$totale_uren_stage')";
        header("location: login.php");
        if ( $conn->query($user) === FALSE) {
            echo "error" . $user . "<br />" . $conn->error;
        } else {
    }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="username">username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="wachtwoord">wachtwoord</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required>
        <br>
        <label for="totale_uren_stage">Aantal stage uren</label>
        <input type="number" name="totale_uren_stage" id="totale_uren_stage" required>
        <br>
        <input type="submit" name="submit" value="sign up">
        </form>
</body>
</html>