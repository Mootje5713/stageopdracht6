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
                <li class="is-selected"><a href="dashboard_pb.php" title="Dashboard"><i class="flaticon house"></i>Dashboard</a></li>
                <li><a href="index.php" title="Stage"><i class="flaticon suitcase-1"></i>Stage</a></li>
            </ul>
        </div>
        <div class="navigation-footer">
            <ul>
                <li>
                    <a href="dashboard.php" title="Profiel">
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
                    <a href="Dashboard.php">
                        <span class="is-fixed is-lastcrumb is-single" style="color: white">Dashboard</span>
                    </a>
                </h1>
            </div>
        </header>
        <div class="content">
            <div class="content l-medium">
                <div class="content--part" id="idc3">
                    <div class="tasks tasks-planning" id="id7">
                        <div class="week-plan">
                            <div class="task has-popout">
                                <p>
                                    <span>
                                        <p>
                                            Welkom beste stagiair op het portaal van talent. 
                                            Op dit portaal kun je zien wie jouw stagebegeleider is en als je op de stage link klikt kun je stageverslagen invullen, ook kan je stageuren invullen
                                            en ook kan je een dag selecteren samen met het verslag en het aantal uur dat je hebt gemaakt.
                                        </p>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>