<?php
include "connection.php";
include "functions.php";

if (isset($_GET['id'])) {
    $query = "SELECT * FROM `reports` WHERE id = ".$_GET['id']." ";
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $user_id = $row['user_id'];
            }
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `reports` WHERE id =$id"; 
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