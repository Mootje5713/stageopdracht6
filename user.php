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
    } else {
        updateTotaluren($user_id, $conn);
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
            $totaal = intval($row['totaal']);
        }
    }
}
$query2 = "SELECT * FROM `users` WHERE id = " . $_GET["id"] . "";
$result = $conn->query($query2);
if ($result === FALSE) {
    echo "error" . $query2 . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user = $row;
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
    <link rel="stylesheet" type="text/css" href="fonts.css" />
    <script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.pages.AbstractEduArioPage/jquery.viewport.mini-ver-1650447270000.js"></script>
</head>
<div class="l-container">
    <nav class="navigation navigation--docent">
        <div class="navigation-header">
            <div class="navigation-header--logo">
                <a><img src="https://talnet-student.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/img/logo-eduarte-ver-1650447256000.svg" alt="EduArtelogo" /></a>
            </div>
            <div class="omgevingIndicator productieomgeving"></div>
            <i class="navigation-header--close-navigation js-navigation flaticon x-1" id="ida2"></i>
        </div>
        <div class="navigation-items">
            <ul class="navigation-items--main">
                <li><a href="dashboard_pb.php" title="Dashboard"><i class="flaticon house"></i>Dashboard</a></li>
                <li class="is-selected"><a href="manual.php" title="Stagiairs"><i class="flaticon group-1"></i>Stagiairs</a></li>
            </ul>
        </div>
        <div class="navigation-footer">
            <ul>
                <li>
                    <a href="dashboard_pb.php" title="Profiel">
                        <i class="flaticon user-2"></i>
                    </a>
                </li>
                <li><a href="logout.php" title="Uitloggen"><i class="flaticon logout"></i></a></li>
                <i class="flaticon logout"></i>
                </a>
            </ul>
        </div>
    </nav>
    <div class="l-flex-content">
        <header class="header">
            <div class="header-toolbar">
                <i class="header-toolbar--open-navigation js-navigation flaticon menu-2" id="ida4"></i>
                <h1>
                    <a href="dashboard_pb.php">
                        <span class="is-fixed is-lastcrumb is-single">Dashboard</span>
                    </a>
                    <i class="flaticon right-2"></i>
                    <a href="manual.php">
                        <span class="is-fixed is-lastcrumb is-single">Stagiairs</span>
                    </a>
                    <i class="flaticon right-2"></i>
                    <span class="is-dynamic is-lastcrumb"><?php echo $user['username']; ?></span>
                </h1>
            </div>
            <div class="header-tabs" id="ida3">
                <ul style="transition: none 0s ease 0s;">
                    <li class="is-selected">
                        <a href="#" title="Logboek">Logboek</a>
                    </li>
                </ul>
            </div>
        </header>
        <div class="popover defaultPopoverWidth" id="idc0">
        </div>
        <aside class="s5-aside-slidebar">
            <div id="idc1" style="display:none"></div>
        </aside>
        <section class="content-wrapper js-scroll-wrapper" style="margin-top: 0px;">
            <div id="ida1">
            </div>
            <div class="content l-medium" id="idc2">
                <div class="content--part" id="idc3">
                    <h2 class="is-header">
                        <span><?php echo $weekdisplay; ?></span>
                        <span class="is-soft"><?php echo " / " . "Week " . $weeknumber; ?></span>
                    </h2>
                    <?php if (!isset($report)) :
                        echo "<h3>Nog geen verslagen of uren ingevuld!!</h3>";
                    else :
                    ?>
                        <div class="tasks tasks-planning" id="id7">
                            <?php foreach ($report as $row) : ?>

                                <div class="week-plan">
                                    <div class="task has-popout">
                                        <div class="task--summary popout--toggle js-popout-toggle">
                                            <span class="week-plan--title"><?php echo $days[date_format(date_create($row['timestamp']), "w")]; ?></span>
                                            <p>
                                                <span>
                                                    <?php echo $row['verslag']; ?>
                                                </span>
                                            </p>

                                            <small class="task--summary-meta">
                                                <div>
                                                    <?php if ($row['is_accepted'] == !NULL) : ?>
                                                        <span>
                                                            <?php echo $row['uren']; ?>u ✓&nbsp;
                                                        </span>
                                                        <a href="#" class="button-soft" onclick="window.location.href='update_pb.php?id=<?php echo $row['id'] ?>'">Corrigeren</a>
                                                    <?php else : ?>
                                                        <a href="#" class="button-soft" onclick="window.location.href='update_pb.php?id=<?php echo $row['id'] ?>'">Corrigeren</a>
                                                        <a href="#" class="button-action" id="ida6" onclick="if(confirm('Weet je het zeker'))window.location.href='accept_pb.php?id=<?php echo $row['id']; ?>&returnurl=<?php echo $returnurl; ?>'">Akkoord</a>
                                                    <?php endif; ?>
                                                </div>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="log--accept">
                        <small class="log--accept-message" id="id28"></small>
                        <small class="log--accept-total-hours">Totaal: <?php echo $totaal ?>u</small>
                    </div>
                    <a href="#" class="btn btn-pri" onclick="window.location.href='user.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $i + 1 ?>'">
                        Vorige week</a>
                    <a href="#" class="btn btn-pri" onclick="window.location.href='user.php?id=<?php echo $_GET['id']; ?>&page=<?php echo $i - 1 ?>'">
                        Volgende week</a>
                </div>
            </div>
        </section>
        <?php include "footer.php" ?>