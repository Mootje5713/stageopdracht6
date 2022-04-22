<?php
    include "connection.php"; 
    include "functions.php";
    if (isset($_SESSION['praktijkbegeleider_user_id'])) {
        header("Location: index.php");
    } 
    if (isset($_GET['report'])) {
        $report = $_GET['report'];
        $report = "INSERT INTO `reports` (verslag)
        VALUES('$report')"; 

    if ( $conn->query($report) === FALSE) {
        echo "error" . $report . "<br />" . $conn->error;
        }
}
    if (isset($_GET['page'])) {
        $i=intval($_GET['page']);
    } else {
        $i=0;
    }
    $date = date('Y-m-d', strtotime('-'.($i*7).' days'));
    $query = "SELECT * FROM reports WHERE user_id = '".$_GET['id']."' AND WEEK(`timestamp`, 1)= WEEK('$date', 1) ORDER BY id DESC";
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
    $query = "SELECT sum(uren) as totaal FROM reports WHERE user_id = '".$_GET['id']."' AND WEEK(`timestamp`, 1)= WEEK('$date', 1) ORDER BY timestamp DESC";
    $result=$conn->query($query);
    if ($result === false) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()) {
                $totaal[] = $row;
            }
        }
    }
$conn->close();
?>

<?php
    include "header.php";
?>
<a href="manual.php">Terug</a>

<h1><?php echo "Week - " . date("W",  strtotime($date)); ?></h1>
<?php foreach($totaal as $row): ?>
    <?php if($row['totaal'] == 0): ?>
        <p>De stagiar heeft deze week 0 uren gemaakt</p>
    <?php else: ?>
        <p>De stagiar heeft deze week in totaal <?php echo $row['totaal']?> uren gemaakt</p>
    <?php endif; ?>
<?php endforeach; ?>
<button class="btn" onclick="window.location.href='user.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $i+1 ?>'">
Vorige week</button>
<button class="btn" onclick="window.location.href='user.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $i-1 ?>'">
Volgende week</button>

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
                    <button class="btn" onclick="window.location.href='updateverslag_pb.php?id=<?php echo $row['id'] ?>'">Stageverslag wijzigen</button>
                    <?php if($row['uren'] <=1): ?>
                        <h2>Je hebt een uur stage gelopen</h2>
                        <h2><?php echo $row['timestamp']; ?></h2>
                    <?php else: ?>
                        <h2>Je hebt <?php echo $row['uren']?> uur stage gelopen</h2>
                        <h2><?php echo $row['timestamp']; ?></h2>
                    <?php endif; ?>
                    <button class="btn" onclick="window.location.href='delete_pb.php?id=<?php echo $row['id'] ?>&page=<?php echo $_GET['page'] ?>'">Stagedag verwijderen</button>
                    <button class="btn" onclick="window.location.href='updateuren_pb.php?id=<?php echo $row['id'] ?>&page=<?php echo $_GET['page'] ?>'">Stageuren wijzigen</button>
                <?php else: ?>
                    <button class="btn" onclick="window.location.href='undelete_pb.php?id=<?php echo $row['id'] ?>&page=<?php echo $_GET['page'] ?>'">Stagedag terughalen</button>
                    <button class="btn" onclick="if(confirm('Weet je het zeker'))window.location.href='erase_pb.php?id=<?php echo $row['id'] ?>&page=<?php echo $_GET['page'] ?>'">Definitief Verwijderen</button>
                    <?php endif; ?>
                </tr>
            </table>
        </li>
    </ul>
<?php endforeach; ?>
<?php endif; ?>
<?php include "footer.php" ?>