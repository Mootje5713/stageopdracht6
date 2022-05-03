<?php
    include "connection.php";
    $query = "SELECT * FROM `users` WHERE praktijkbegeleider_user_id IS NULL";
    $result=$conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $praktijkbegeleiders[] = $row;
            }
        }
    }
    if (isset($_POST['username']) && ($_POST['wachtwoord']) && ($_POST['totale_uren_stage'])
    && ($_POST['praktijkbegeleider_user_id'])) {
        $username =  $_POST['username'];
        $password =  $_POST['wachtwoord'];
        $totale_uren_stage = $_POST['totale_uren_stage'];
        $praktijkbegeleider_user_id = $_POST['praktijkbegeleider_user_id'];
        $user = "INSERT INTO `users`(username, wachtwoord, totale_uren_stage, praktijkbegeleider_user_id)
        VALUES ('$username', '$password', '$totale_uren_stage', '$praktijkbegeleider_user_id')";
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
    <a href="login.php">Terug</a>
    <form action="" method="POST">
        <label for="username">username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="wachtwoord">wachtwoord</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required>
        <br>
        <label for="praktijkbegeleider">praktijkbegeleider</label>
        <select name="praktijkbegeleider_user_id" id="praktijkbegeleider_user_id"> 
            <?php foreach($praktijkbegeleiders as $row): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="totale_uren_stage">Aantal stage uren</label>
        <input type="number" name="totale_uren_stage" id="totale_uren_stage" required>
        <br>
        <input type="submit" name="submit" value="sign up">
        </form>
        Ben je een praktijkbegeleider <a href="register2.php">klik hier</a>
</body>
</html>