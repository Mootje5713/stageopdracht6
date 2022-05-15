<?php
include "connection.php";
include "functions.php";
if (isset($_SESSION['praktijkbegeleider_user_id'])) {
    header("Location: index.php");
}

$query = "SELECT * FROM `users` WHERE praktijkbegeleider_user_id = " . $_SESSION["user_id"] . "";
$result = $conn->query($query);
if ($result === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $percentage = $row['percentage'] = round(($row['totaal'] / $row['totale_uren_stage']) * 100);
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
    <link rel="stylesheet" type="text/css" href="fonts.css" />
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
                    <li><a href="#=" title="Stageplaatsen"><i class="flaticon open-book-2"></i>Stageplaatsen</a></li>
                    <li class="is-selected"><a href="index.php" title="Stagiairs"><i class="flaticon suitcase-1"></i>Stagiairs</a></li>
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
                        <a href="#">
                            <span class="is-fixed is-lastcrumb">Stagiairs</span>
                        </a>
                    </h1>
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
            <section class="content-wrapper js-scroll-wrapper has-small-header" style="margin-top: 0px;">
                <div class="content has-sidebar">
                    <div class="l-full overzicht" id="id64">
                        <div style="position: absolute; top: 22.5px;"></div>
                        <div style="position: absolute; top: 22.5px;"></div>
                        <table class="table s5-table tblClick">
                            <thead>
                                <tr>
                                    <th id="id61" class="table--sortable is-sorted">
                                        Naam
                                        <i class="flaticon up-1"></i>
                                    </th>
                                    <th>Status</th>
                                    <th>Overeenkomst afgehandeld</th>
                                    <th id="id62" class="table--sortable">
                                        Begindatum
                                        <i class="flaticon"></i>
                                    </th>
                                    <th id="id63" class="table--sortable">
                                        Einddatum
                                        <i class="flaticon"></i>
                                    </th>
                                    <th>Nog goed te keuren uren</th>
                                    <th>Stagevoortgang</th>
                                </tr>
                            </thead>

                            <tbody class="data" id="id72">
                                <?php foreach ($users as $row) : ?>
                                    <tr id="id73">
                                        <td>
                                            <div>
                                                <a>
                                                    <p>
                                                        <a href="user.php?id=<?php echo $row['id'] ?>">
                                                            <?php echo $row['username'] ?>
                                                        </a>
                                                    </p>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="s5-has-label">
                                            <span class="s5-tag-label task-completed">Actief</span>
                                        </td>
                                        <td>Ja</td>
                                        <td style="white-space: nowrap;">
                                            <time><?php echo $row['begin_datum'] ?></time>
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <time><?php echo $row['eind_datum'] ?></time>
                                        </td>
                                        <td>Ja</td>
                                        <td>
                                            <div class="student-progress">
                                                <div class="student-progress--bar">
                                                    <span class="student-progress--average"><small><?php echo $row['totaal'] ?> van <?php echo $row['totale_uren_stage']; ?></small></span>
                                                    <div class="student-progress--achieved" style="width: <?php echo $row['percentage'] ?>%;"></div>
                                                    <div class="student-progress--expected"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include "footer.php"; ?>