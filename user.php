<?php
    include "connection.php"; 
    if (!isset($_GET['id'])) {
        header("Location: manual.php");
    }
    if (isset($_GET['report'])) {
        $report = $_GET['report'];
        $report = "INSERT INTO `reports` (verslag)
        VALUES('$report')"; 

    if ( $conn->query($report) === FALSE) {
        echo "error" . $report . "<br />" . $conn->error;
        }
}
    $query = "SELECT * FROM reports WHERE user_id = '" . $_GET['id'] . "' ORDER BY id DESC";
    $result=$conn->query($query);
    if ($result === false) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $report[] = $row;
            }
        }
    }

    if (isset($_GET['page'])) {
        $i=intval($_GET['page']);
    } else {
        $i=0;
    }
    $date = date('Y-m-d', strtotime('-'.($i*7).' days'));
    $query = "SELECT * FROM reports WHERE user_id = '".$_SESSION['user_id']."' AND WEEK(`timestamp`, 1)= WEEK('$date', 1) ORDER BY id DESC";
    $result=$conn->query($query);
    if ($result === false) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $report[] = $row;
            }
        }
    }
    $conn->close();
?>

<?php
    include "header.php";
?>

<h1><?php echo "Week - " . date("W",  strtotime($date)); ?></h1>

<?php if(!isset($report)):
    echo "<h3>Nog geen verslagen of uren ingevuld!!</h3>";
    else:
    ?>
<?php foreach($report as $row): ?>
    <ul>
        <li>
            <table>
                <tr>
                <?php if(($row['deleted']) == ''):?>
                    <h2><?php echo $row['verslag']?></h2>
                    <button class="btn" onclick="window.location.href='updateverslag.php?id=<?php echo $row['id'] ?>'">Stageverslag wijzigen</button>
                    <?php if($row['uren'] <=1): ?>
                        <h2>Je hebt een uur stage gelopen</h2>
                        <h2><?php echo $row['timestamp']; ?></h2>
                    <?php else: ?>
                        <h2>Je hebt <?php echo $row['uren']?> uur stage gelopen</h2>
                        <h2><?php echo $row['timestamp']; ?></h2>
                    <?php endif; ?>
                    <button class="btn" onclick="window.location.href='delete.php?id=<?php echo $row['id'] ?>'">Stagedag verwijderen</button>
                    <button class="btn" onclick="window.location.href='updateuren.php?id=<?php echo $row['id'] ?>'">Stageuren wijzigen</button>
                <?php else: ?>
                    <button class="btn" onclick="window.location.href='undelete.php?id=<?php echo $row['id'] ?>'">Stagedag terughalen</button>
                    <button class="btn" onclick="if(confirm('Weet je het zeker'))window.location.href='erase.php?id=<?php echo $row['id'] ?>'">Definitief Verwijderen</button>
                    <?php endif; ?>
                </tr>
            </table>
        </li>
    </ul>
<?php endforeach; ?>
<?php endif; ?>
<?php include "footer.php" ?>