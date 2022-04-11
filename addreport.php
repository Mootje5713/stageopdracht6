<?php
    include "connection.php";
    if (isset($_POST['submit'])) {
        $verslag = $_POST['verslag'];
        $uren = $_POST['uren'];
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO `reports` (verslag, uren, user_id)
        VALUES('$verslag', '$uren', '$user_id')"; 
        $result = $conn->query($query);
        if ( $result === FALSE) {
            echo "error <br />" . $query . "<br />" . $conn->error;
        } else {
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