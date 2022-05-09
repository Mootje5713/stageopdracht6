<?php
    include "connection.php";
    include "functions.php";
    if (isset($_POST['submit'])) {
        $verslag = $_POST['verslag'];
        $uren = $_POST['uren'];
        $timestamp = $_POST['timestamp'];
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO `reports` (verslag, uren, timestamp, user_id)
        VALUES('$verslag', '$uren', '$timestamp', '$user_id')"; 
        $result = $conn->query($query);
        if ( $result === FALSE) {
            echo "error <br />" . $query . "<br />" . $conn->error;
        } else {
            updateTotaluren($user_id, $conn);
            header("Location: index.php");
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html>
<head><script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/org.apache.wicket.resource.JQueryResourceReference/jquery/jquery-2.2.4-ver-1526491824000.js"></script>
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.components.panel.EduArioFeedbackPanel/eduariofeedbackpanel-ver-1650447270000.js"></script>
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/org.apache.wicket.ajax.AbstractDefaultAjaxBehavior/res/js/wicket-ajax-jquery-ver-1526491986000.js"></script>
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.behaviors.EduArioUIResourceReference/EduArioUI-ver-1650447270000.js"></script>
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.components.menu.AbstractSubMenu/SubMenuHeaderTabs-ver-1650447270000.js"></script>
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.cobra.web.components.ajax.LazyLoaderResourceReference/jquery.lazyloader-ver-1595841690000.js"></script>
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.cobra.web.components.wiquery.resources.ResourceRefUtil/json2-ver-1595841692000.js"></script>
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.cobra.web.behaviors.ServerCallAjaxBehaviour/servercall-ver-1595841690000.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="apple-mobile-web-app-title" content="EduArte Portalen" />
<link rel="apple-touch-icon" sizes="180x180"
	href="https://talnet-student.educus.nl/assets/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32"
	href="https://talnet-student.educus.nl/assets/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16"
	href="https://talnet-student.educus.nl/assets/img/favicon-16x16.png">
<link rel="manifest" href="https://talnet-student.educus.nl/assets/img/site.webmanifest">
<link rel="mask-icon" href="https://talnet-student.educus.nl/assets/img/safari-pinned-tab.svg"
	color="#5bbad5">
<link rel="shortcut icon" href="https://talnet-student.educus.nl/assets/img/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config"
	content="https://talnet-student.educus.nl/assets/img/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta name="description" content="EduArte Portalen" />
<meta name="author" content="Iddink Group" />
<title>Logboek - EduArte Portalen</title>
<link rel="stylesheet" type="text/css" href="https://talnet-student.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/stylesheets/styles-ver-1650447270000.css" />
<script type="text/javascript" src="https://talnet-student.educus.nl/wicket/resource/nl.topicus.eduario.web.pages.AbstractEduArioPage/jquery.viewport.mini-ver-1650447270000.js"></script>
</head>
<body class="authenticator--background authenticator--page">
	<div style="display:none"></div>
    <section class="authenticator--wrapper">
        <div class="authenticator--body is-small">
			<div class="authenticator--panel">

<?php
    include "form.php";
?>

<?php
    include "footer.php";
?>