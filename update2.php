<?php
include "connection.php";
include "functions.php";
if (isset($_GET['id'])) {
    $query = "SELECT verslag, user_id FROM `reports` WHERE id = " . $_GET['id'] . "";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $verslag = $row['verslag'];
                $user_id = $row['user_id'];
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $verslag = $_POST['verslag'];
    $query = "UPDATE `reports` SET verslag = '$verslag' WHERE id = $id";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        updateTotaluren($user_id, $conn);
        header("Location: user.php?id=" . $user_id . "");
    }
}

if (isset($_GET['id'])) {
    $query = "SELECT uren, user_id FROM `reports` WHERE id = " . $_GET['id'] . "";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $uur = $row['uren'];
                $user_id = $row['user_id'];
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $uren = $_POST['uren'];
    $query = "UPDATE `reports` SET uren = $uren WHERE id= $id";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        updateTotaluren($user_id, $conn);
        header("Location: index.php?id=" . $user_id . "");
    }
}
$conn->close();
?>

<?php
include "header.php";
?>
<iframe src="index.php?id=<?php echo $user_id; ?>" style="position: fixed; z-index: 0; border: 0; width: 100%; height: 100%;"></iframe>

<?php
include "formupdate2.php";
?>

<?php
include "footer.php";
?>