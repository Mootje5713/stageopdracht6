<?php
include "connection.php";
if (!isset($_SESSION['praktijkbegeleider_user_id'])) {
    header("Location: manual.php");
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
$query = "SELECT * FROM reports WHERE user_id = '" . $_SESSION['user_id'] . "' AND WEEK(`timestamp`, 1)= WEEK('$date', 1) ORDER BY timestamp DESC";
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

$query = "SELECT sum(uren) as totaal FROM reports WHERE user_id = '" . $_SESSION['user_id'] . "' AND WEEK(`timestamp`, 1)= WEEK('$date', 1) ORDER BY timestamp DESC";
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
        <nav class="navigation navigation--student">
            <div class="navigation-header">
                <div class="navigation-header--logo">
                    <a><img src="https://talnet-student.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/img/logo-eduarte-ver-1650447256000.svg" alt="EduArtelogo" /></a>
                </div>
                <div class="omgevingIndicator productieomgeving"></div>
                <i class="navigation-header--close-navigation js-navigation flaticon x-1" id="id1f"></i>
            </div>
            <div class="navigation-items">
                <ul class="navigation-items--main">
                    <li><a href="index.php" title="Dashboard"><i class="flaticon house"></i>Dashboard</a></li>

                    <li class="is-selected"><a href="index.php" title="Stage"><i class="flaticon suitcase-1"></i>Stage</a></li>


                    <li><a href="manual.php" title="Stagiairs"><i class="flaticon open-book-2"></i>Stagiairs</a></li>

                </ul>
            </div>
            <div class="navigation-footer">
                <ul>
                    <li><a href="#" title="Profiel"><i class="flaticon user-2"></i></a></li>
                    <li><a href="logout.php" title="Uitloggen"><i class="flaticon logout"></i></a></li>
                </ul>
            </div>
        </nav>
        <div class="l-flex-content">
            <header class="header">
                <div class="header-toolbar">
                    <i class="header-toolbar--open-navigation js-navigation flaticon menu-2" id="id4"></i>
                    <h1>
                        <a href="index.php">
                            <span class="is-fixed is-lastcrumb">Stage</span>
                        </a>
                        <i class="flaticon right-2"></i>
                        <span class="is-fixed is-lastcrumb is-single">Logboek</span>
                    </h1>
                </div>
                <div class="header-tabs" id="id3">
                    <ul style="transition: none 0s ease 0s;">
                        <li class="is-selected"><a href="#" title="Logboek">Logboek</a></li>
                        <li><a href="#" title="Dossier">Dossier</a></li>
                        <li><a href="#" title="Info">Info</a></li>
                    </ul>
                    <span class="header-tabs--toggle"><i class="flaticon menu-2"></i></span>
                </div>
            </header>
            <div class="popover defaultPopoverWidth" id="id14"></div>
            <aside class="s5-aside-slidebar">
                <div id="id15" style="display:none"></div>
            </aside>
            <section class="content-wrapper js-scroll-wrapper" style="margin-top: 0px;">
                <div id="id1"></div>
                <div class="content l-medium" id="id16">
                    <div id="id17" style="display:none"></div>
                    <div class="content--part" id="id18">
                        <h2 class="is-header">
                            <span><?php echo $weekdisplay; ?></span>
                            <span class="is-soft"><?php echo " / " . "Week " . $weeknumber; ?></span>
                        </h2>
                        <div class="tasks tasks-planning" id="id7">
                            <div class="week-plan">
                                <span class="week-plan--title">?</span>
                                <div class="task task--empty">
                                    <div class="task--summary">
                                        <p>Er is nog geen log op deze dag</p>
                                        <small class="task--summary-meta"><a class="js-toggle-popover-log" id="id14" href="addreport.php"><i class="flaticon compose-2"></i></a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($report as $row) : ?>
                            <?php if (($row['deleted']) == '') : ?>
                                <!-- weekplan loop -->
                                <div class="week-plan">
                                    <span class="week-plan--title"><?php echo $days[date_format(date_create($row['timestamp']), "w")]; ?></span>
                                    <div class="task has-popout">
                                        <div class="task--summary popout--toggle js-popout-toggle">
                                            <p>
                                                <span>
                                                    <?php echo $row['verslag'] ?>
                                                </span>
                                            </p>
                                            <small class="task--summary-meta"><span>
                                                    <?php echo $row['uren'] ?>u</span></small>
                                            <div class="task--summary-status">
                                                <?php if ($row['is_accepted'] == NULL) : ?>
                                                    <span class="s5-tag-label">Ingediend</span>
                                                <?php else : ?>
                                                    <span class="s5-tag-label s5-label--success">Akkoord</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="popout">
                                            <div class="popout--body popout--aside emoticon--wrapper">
                                                <div class="popout--emotion is-happy">
                                                    <i class="emoticon"></i>
                                                </div>
                                            </div>
                                            <div class="popout--options">
                                                <ul>
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end loop; -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="log--accept">
                            <small class="log--accept-message" id="id28"></small>
                            <small class="log--accept-total-hours">Totaal:<?php echo $totaal ?>u</small>
                        </div>
                        <br>
                        <button onclick="window.location.href='index.php?page=<?php echo $i + 1 ?>'">Vorige week</button>
                        <button onclick="window.location.href='index.php?page=<?php echo $i - 1 ?>'">Volgende week</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
<?php include "footer.php"; ?>