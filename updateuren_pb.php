<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $uren = $_POST['uren'];
    $user_id = $_SESSION["user_id"];
    $query = "UPDATE `reports` SET uren = $uren WHERE id= $id"; 
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
    
}

if (isset($_GET['id'])) {
    $query = "SELECT uren FROM `reports` WHERE id = ". $_GET['id'] . "";
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $uur = $row;
            }
        }
    }
}
$conn->close();

?>

<?php
include "header.php";
?>

<?php
include "formuren.php";
?>

<?php
include "footer.php";
?>