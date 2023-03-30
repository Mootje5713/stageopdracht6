<?php
include "connection.php";
if (isset($_POST['username']) && ($_POST['wachtwoord'])) {
    $username =  $_POST['username'];
    $wachtwoord = $_POST['wachtwoord'];
    $query = "SELECT * FROM `users` WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                sleep(3);
                if (password_verify($wachtwoord, $row['wachtwoord'])) {
                    $_SESSION["user_id"] = $row['id'];
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["praktijkbegeleider_user_id"] = $row['praktijkbegeleider_user_id'];
                } else {
                    echo "Wachtwoord niet gevonden!";
                }
            }
        } else {
            echo "Gebruiker niet gevonden!";
        }
    }
}
if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['praktijkbegeleider_user_id'])) {
        header('Location: dashboard.php');
    } else {
        header('Location: dashboard_pb.php');
    }
}
$conn->close();
include "header.php";
?>

<body class="authenticator--background authenticator--page">
    <div id="id2" style="display:none"></div>
    <section class="authenticator--wrapper">
        <div class="authenticator--body is-small">
            <div class="authenticator--panel">
                <form class="authenticator-signin" id="id3" method="post" action="">
                    <fieldset>
                        <div class=authenticator--form-field>
                            <h2 id="id5">ROCvA - ROCvF</h2>
                        </div>
                        <div class="authenticator--form-field">
                            <input type="text" value="" name="username" id="id6" placeholder="Gebruikersnaam" class="" />
                        </div>
                        <div class="authenticator--form-field">
                            <input type="password" value="" name="wachtwoord" id="id7" placeholder="Wachtwoord" class="" />
                        </div>
                    </fieldset>
                    <input style="background: #0bca6a; border: 0;" type="submit" class="button-action authenticator--submit" id="id4" name="submit" value="Login">
                </form>
            </div>
            <ul class="authenticator-signin--links">
                <li><a href="register.php">Nog geen account? klik hier</a></li>
            </ul>
        </div>
    </section>
</body>

</html>