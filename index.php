<?php
    include "connection.php";
    if (!isset($_SESSION['praktijkbegeleider_user_id'])) {
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
    if (isset($_GET['page'])) {
        $i=intval($_GET['page']);
    } else {
        $i=0;
    }
    echo "<button> vorige week" . $date = date('Y-m-d', strtotime('-'.($i*7).' days')) . "</button>";
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
<div class="title">
    <a href="addreport.php">Voeg je verslag</a>
</div>
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
                    <?php if($row['uren'] <=1): ?>
                        <h2>Je hebt een uur stage gelopen</h2>
                        <h2><?php echo $row['timestamp']; ?></h2>
                    <?php else: ?>
                        <h2>Je hebt <?php echo $row['uren']?> uur stage gelopen</h2>
                        <h2><?php echo $row['timestamp']; ?></h2>
                    <?php endif; ?>
                <?php else: ?>
                    <?php endif; ?>
                </tr>
            </table>
        </li>
    </ul>
<?php endforeach; ?>
<?php endif; ?>
<?php include "footer.php" ?>