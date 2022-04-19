
<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE `reports` SET deleted = NOW() WHERE user_id=$user_id AND id=$id"; 
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
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
include "footer.php";
?>