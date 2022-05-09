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

    if ($conn->query($report) === FALSE) {
        echo "error" . $report . "<br />" . $conn->error;
    }
}
if (isset($_GET['page'])) {
    $i = intval($_GET['page']);
} else {
    $i = 0;
}
$date = date('Y-m-d', strtotime('-' . ($i * 7) . ' days'));
$query = "SELECT * FROM reports WHERE user_id = '" . $_GET['id'] . "' AND WEEK(`timestamp`, 1)= WEEK('$date', 1) ORDER BY id DESC";
$result = $conn->query($query);
if ($result === false) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $report[] = $row;
        }
    }
}
$query = "SELECT sum(uren) as totaal FROM reports WHERE user_id = '" . $_GET['id'] . "' AND WEEK(`timestamp`, 1)= WEEK('$date', 1) ORDER BY timestamp DESC";
$result = $conn->query($query);
if ($result === false) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $totaal[] = $row;
        }
    }
}
$returnurl = urlencode("user.php?id=" . $_GET['id'] . "&page=" . $i . "");
$conn->close();
$year = date("Y",  strtotime($date));;
$weeknumber = date("W",  strtotime($date));
$firstday = strtotime($year . 'W' . $weeknumber);
$lastday = strtotime("+7 day", $firstday);
$weekdisplay = date('j M', $firstday) . " - " . date('j M', $lastday);
$date = date_create($row['timestamp']);
$days[0] = "zo";
$days[1] = "ma";
$days[2] = "di";
$days[3] = "wo";
$days[4] = "do";
$days[5] = "vr";
$days[6] = "za";
?>

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/org.apache.wicket.resource.JQueryResourceReference/jquery/jquery-2.2.4-ver-1526491824000.js"></script>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.components.panel.EduArioFeedbackPanel/eduariofeedbackpanel-ver-1650447270000.js"></script>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/org.apache.wicket.ajax.AbstractDefaultAjaxBehavior/res/js/wicket-ajax-jquery-ver-1526491986000.js"></script>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.behaviors.EduArioUIResourceReference/EduArioUI-ver-1650447270000.js"></script>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.components.menu.AbstractSubMenu/SubMenuHeaderTabs-ver-1650447270000.js"></script>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.cobra.web.components.ajax.LazyLoaderResourceReference/jquery.lazyloader-ver-1595841690000.js"></script>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.cobra.web.components.wiquery.resources.ResourceRefUtil/json2-ver-1595841692000.js"></script>
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.cobra.web.behaviors.ServerCallAjaxBehaviour/servercall-ver-1595841690000.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-title" content="EduArte Portalen" />
    <link rel="apple-touch-icon" sizes="180x180" href="https://talnet-student.educus.nl/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://talnet-student.educus.nl/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://talnet-student.educus.nl/assets/img/favicon-16x16.png">
    <link rel="manifest" href="https://talnet-student.educus.nl/assets/img/site.webmanifest">
    <link rel="mask-icon" href="https://talnet-student.educus.nl/assets/img/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://talnet-student.educus.nl/assets/img/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="https://talnet-student.educus.nl/assets/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="EduArte Portalen" />
    <meta name="author" content="Iddink Group" />
    <title>Logboek - EduArte Portalen</title>
    <link rel="stylesheet" type="text/css" href="https://talnet-student.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/stylesheets/styles-ver-1650447270000.css" />
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.pages.AbstractEduArioPage/jquery.viewport.mini-ver-1650447270000.js"></script>
</head>

<body>
    <div class="l-container">
        <div class="l-flex-content">
            <div class="header">
                <h2>
                    <a href="manual.php">
                        Stage
                    </a>
                    <i class="flaticon right-2"></i>
                    <span class="is-fixed is-lastcrumb is-single">Stagiair</span>
                </h2>
            </div>
            <h2 class="is-header">
                <span><?php echo $weekdisplay; ?></span>
                <span class="is-soft"><?php echo " / " . "Week " . $weeknumber; ?></span>
            </h2>
            <?php foreach ($totaal as $row) : ?>
                <?php if ($row['totaal'] == 0) : ?>
                    <p>Deze stagiar heeft deze week 0 uren gemaakt</p>
                <?php else : ?>
                    <p>Deze stagiar heeft deze week in totaal <?php echo $row['totaal'] ?> uren gemaakt</p>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!isset($report)) :
                echo "<h3>Nog geen verslagen of uren ingevuld!!</h3>";
            else :
            ?>
                <?php foreach ($report as $row) : ?>
                    <div class="tasks tasks-planning" id="id7">
                        <div class="week-plan">
                            <div class="task has-popout">
                                <div class="task--summary popout--toggle js-popout-toggle">
                                    <span class="week-plan--title"><?php echo $days[date_format(date_create($row['timestamp']), "w")]; ?></span>
                                    <p>
                                        <?php if (($row['deleted']) == '') : ?>
                                            <span>
                                                <?php echo $row['verslag'] ?>
                                                <button class="btn" onclick="window.location.href='delete_pb.php?id=<?php echo $row['id']; ?>&returnurl=<?php echo $returnurl; ?>'">Stagedag verwijderen</button>
                                            </span>
                                        <?php else : ?>
                                            <button class="btn" onclick="window.location.href='undelete_pb.php?id=<?php echo $row['id']; ?>&returnurl=<?php echo $returnurl; ?>'">Stagedag terughalen</button>
                                            <button class="btn" onclick="if(confirm('Weet je het zeker'))window.location.href='erase_pb.php?id=<?php echo $row['id']; ?>&returnurl=<?php echo $returnurl; ?>'">Definitief Verwijderen</button>
                                        <?php endif; ?>
                                        <?php if ($row['uren'] <= 1) : ?>
                                    <h2> een uur stage gelopen</h2>
                                    <h2><?php echo $row['timestamp']; ?></h2>
                                <?php else : ?>
                                    <p><?php echo $row['uren'] ?> uur stage gelopen</p>
                                    &nbsp;
                                    <p><?php echo $row['timestamp']; ?></p>
                                <?php endif; ?>
                                </p>
                                </div>
                            </div>
                        </div>
                        <button class="btn" onclick="window.location.href='updateverslag_pb.php?id=<?php echo $row['id'] ?>'">Stageverslag wijzigen</button>
                        <button class="btn" onclick="window.location.href='updateuren_pb.php?id=<?php echo $row['id']; ?>&returnurl=<?php echo $returnurl; ?>'">Stageuren wijzigen</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <button class="btn" onclick="window.location.href='user.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $i + 1 ?>'">
                Vorige week</button>
            <button class="btn" onclick="window.location.href='user.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $i - 1 ?>'">
                Volgende week</button>
            <br>
            <br>
            <button class="btn" onclick="if(confirm('Weet je het zeker'))window.location.href='accept_pb.php?id=<?php echo $row['id']; ?>&returnurl=<?php echo $returnurl; ?>'">Goedkeuren</button>
        </div>
    </div>
    <?php include "footer.php" ?>