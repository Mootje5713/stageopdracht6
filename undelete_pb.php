<?php
include "connection.php";
include "functions.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE `reports` SET deleted = NULL WHERE id=$id"; 
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        updateTotaluren($user_id, $conn);
        header("Location: ". urldecode($_GET['returnurl']));
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