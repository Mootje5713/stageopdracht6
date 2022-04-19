<?php 
include "connection.php";
if (isset($_SESSION['praktijkbegeleider_user_id'])) {
    header("Location: index.php");
} 
$query = "SELECT * FROM `users` WHERE praktijkbegeleider_user_id = " . $_SESSION["user_id"] . " ORDER BY id DESC";
$result=$conn->query($query);
if ( $result === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows>0) {
        while($row=$result->fetch_assoc())
        {
            $users[] = $row;
        }
    }
}
?>

<?php include "header.php" ?>

<h1>Jouw stagaires</h1>

<?php if (!isset($users)): 
    echo "<h3>Nog geen stagaires gevonden!!</h3>";    
        else: 
?>

<?php foreach($users as $row): ?>
    <ul>
        <li>
            <a href="user.php?id=<?php echo $row['id'] ?>">
            <?php echo $row['username']?>
            </a>
        </li>
    </ul>
<?php endforeach ?>
<?php endif; ?>

<?php include "footer.php" ?>