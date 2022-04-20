
<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE `reports` SET deleted = NULL WHERE id=$id"; 
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        header("Location: user.php?id=$id");
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