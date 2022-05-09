<?php
include "connection.php";
include "functions.php";
if (isset($_SESSION['praktijkbegeleider_user_id'])) {
    header("Location: index.php");
}
$query = "SELECT * FROM `users` WHERE praktijkbegeleider_user_id = " . $_SESSION["user_id"] . " ORDER BY id DESC";
$result = $conn->query($query);
if ($result === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
}
$conn->close();

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
    <title>stagiairs - EduArte Portalen</title>
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
                    <li><a href="#=" title="Stagiairs"><i class="flaticon open-book-2"></i>Stagiairs</a></li>
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
                        <a href="manual.php">
                            <span class="is-fixed is-lastcrumb">Stage</span>
                        </a>
                        <i class="flaticon right-2"></i>
                        <span class="is-fixed is-lastcrumb is-single">stagiairs</span>
                    </h1>
                </div>
                <div class="header-tabs" id="id3">
                    <ul style="transition: none 0s ease 0s;">
                        <li class="is-selected"><a href="#" title="stagiairs">stagiairs</a></li>
                    </ul>
                    <span class="header-tabs--toggle"><i class="flaticon menu-2"></i></span>
                </div>
            </header>
            <div class="popover defaultPopoverWidth" id="id14"></div>
            <aside class="s5-aside-slidebar">
                <div id="id15" style="display:none"></div>
            </aside>
            <div class="popover defaultPopoverWidth" id="id14"></div>
            <aside class="s5-aside-slidebar">
                <div id="id15" style="display:none"></div>
            </aside>
            <section class="content-wrapper js-scroll-wrapper" style="margin-top: 0px;">
                <div class="content l-medium" id="id16">
                    <div id="id17" style="display:none"></div>
                    <div class="content--part" id="id18">
                        <h2 class="is-header">
                            <span></span>
                            <span class="is-soft"></span>
                        </h2>
                        <?php foreach ($users as $row) : ?>
                            <div class="week-plan">
                                <div class="task has-popout">
                                    <div class="task--summary popout--toggle js-popout-toggle">
                                        <p>
                                            <span>
                                                <a href="user.php?id=<?php echo $row['id'] ?>">
                                                    <?php echo $row['username'] ?>
                                                    <?php echo $row['totaal'] ?>/ <?php echo $row['totale_uren_stage'] ?>
                                                </a>
                                            </span>
                                        </p>
                                        <div class="popout">
                                            <div class="popout--body popout--aside emoticon--wrapper">
                                                <div class="popout--emotion is-happy">
                                                    <i class="emoticon"></i>
                                                </div>
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
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if (!isset($users)) :
                    echo "<h3>Nog geen stagaires gevonden!!</h3>";
                else :
                ?>
                <?php endif; ?>
            </section>
        </div>
    </div>
<?php include "footer.php"; ?>