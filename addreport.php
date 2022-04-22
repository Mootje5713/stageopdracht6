<?php
    include "connection.php";
    include "functions.php";
    if (isset($_POST['submit'])) {
        $verslag = $_POST['verslag'];
        $uren = $_POST['uren'];
        $timestamp = $_POST['timestamp'];
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO `reports` (verslag, uren, timestamp, user_id)
        VALUES('$verslag', '$uren', '$timestamp', '$user_id')"; 
        $result = $conn->query($query);
        if ( $result === FALSE) {
            echo "error <br />" . $query . "<br />" . $conn->error;
        } else {
            updateTotaluren($user_id, $conn);
            header("Location: index.php");
        }
    }
    $conn->close();
?>
    <a href="index.php">Terug</a>
<?php
    include "header.php";
?>

<?php
    include "form.php";
?>

<?php
    include "footer.php";
?>