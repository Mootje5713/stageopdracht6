<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $verslag = $_POST['verslag'];
    $user_id = $_SESSION["user_id"];
    $query = "UPDATE `reports` SET verslag = '$verslag' WHERE user_id = 
    $user_id AND id= $id"; 
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}
$conn->close();
?>

<?php
include "header.php";
?>

<?php
    include "formverslag.php";
?>

<?php
include "footer.php";
?>