<?php
    include "connection.php";
    if (isset($_POST['username']) && ($_POST['wachtwoord'])) {
        $username =  $_POST['username'];
        $password =  $_POST['wachtwoord'];
        $user = "INSERT INTO `users`(username, wachtwoord)
        VALUES ('$username', '$password')";
        if ( $conn->query($user) === FALSE) {
            echo "error" . $user . "<br />" . $conn->error;
        } else {
            header("location: login.php");
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
<a href="register.php">Terug</a>
    <form action="" method="POST">
        <label for="username">username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="wachtwoord">wachtwoord</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required>
        <br>
        <input type="submit" name="submit" value="sign up">
        </form>
</body>
</html>