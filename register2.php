<?php
    include "connection.php";
    if (isset($_POST['username']) && ($_POST['wachtwoord'])) {
        $username =  $_POST['username'];
        $password =  $_POST['wachtwoord'];
        $user = "INSERT INTO `users`(username, wachtwoord)
        VALUES ('$username', '$password')";
        if ( $conn->query($user) === FALSE) {
            echo "error" . $user . "<br />" . $conn->error;
        } else {
            header("location: login.php");
        }
    }
    $conn->close();
?>
<!DOCTYPE HTML>
<html lang="nl">
<head>
<script type="text/javascript" src="https://login.educus.nl/wicket/resource/org.apache.wicket.resource.JQueryResourceReference/jquery/jquery-2.2.4-ver-F9EE266EF993962AD59E804AD9DEBE66.js"></script>
<script type="text/javascript" src="https://login.educus.nl/wicket/resource/nl.topicus.eduario.web.components.panel.EduArioFeedbackPanel/eduariofeedbackpanel-ver-AAC06FF60F955F9126AE1B506BCF595F.js"></script>
<script type="text/javascript" src="https://login.educus.nl/wicket/resource/org.apache.wicket.ajax.AbstractDefaultAjaxBehavior/res/js/wicket-ajax-jquery-ver-FEE358C0C81212E2E4480902A2B96139.js"></script>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="apple-mobile-web-app-title" content="EduArte Portalen" />
<link rel="apple-touch-icon" sizes="180x180"
	href="https://login.educus.nl/assets/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32"
	href="https://login.educus.nl/assets/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16"
	href="https://login.educus.nl/assets/img/favicon-16x16.png">
<link rel="manifest" href="https://login.educus.nl/assets/img/site.webmanifest">
<link rel="mask-icon" href="https://login.educus.nl/assets/img/safari-pinned-tab.svg"
	color="#5bbad5">
<link rel="shortcut icon" href="https://login.educus.nl/assets/img/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config"
	content="https://login.educus.nl/assets/img/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta name="description" content="EduArte Portalen" />
<meta name="author" content="Iddink Group" />
<link rel="stylesheet" type="text/css" href="https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/stylesheets/styles-ver-791C75DF32208B3036D6915808D48FEE.css" />
<script type="text/javascript" >
/*<![CDATA[*/
Wicket.Event.add(window, "domready", function(event) { 
$('#id1').eduArioFeedback();;
Wicket.Event.publish(Wicket.Event.Topic.AJAX_HANDLERS_BOUND);
;});
/*]]>*/
</script>
<style>
@font-face{font-family:'Open sans';src:url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Light-webfont.woff') format('woff'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Light-webfont.ttf') format('truetype'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Light-webfont.svg#open_sansbold') format('svg');font-weight:300;font-style:light;}@font-face{font-family:'Open sans';src:url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Regular-webfont.woff') format('woff'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Regular-webfont.ttf') format('truetype'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Regular-webfont.svg#open_sansregular') format('svg');font-weight:400;font-style:normal;}@font-face{font-family:'Open sans';src:url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Semibold-webfont.woff') format('woff'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Semibold-webfont.ttf') format('truetype'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Semibold-webfont.svg#open_sansbold') format('svg');font-weight:600;font-style:bold;}@font-face{font-family:'Open sans';src:url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Bold-webfont.woff') format('woff'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Bold-webfont.ttf') format('truetype'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Bold-webfont.svg#open_sansbold') format('svg');font-weight:700;font-style:bolder;}@font-face{font-family:'Nexa';src:url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/Nexa-Regular.woff') format('woff'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/Nexa-Regular.ttf') format('truetype');font-style:normal;}@font-face{font-family:'Flaticons Stroke';src:url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.eot');src:url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.eot?#iefix') format("embedded-opentype"),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.woff') format('woff'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.ttf') format('truetype'),url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.svg#flaticons-stroke') format('svg');font-weight:normal;font-style:normal;}

    h1,h2,h3,h4,h5,h6{font-family:'Nexa', sans-serif;}

</style>
</head>
<body class="authenticator--background authenticator--page">
	<div id="id2" style="display:none"></div>
	<section class="authenticator--wrapper">
    <div class="authenticator--body is-small">
		<div class="authenticator--panel">
            <form action="" method="POST">
            <div class="authenticator--form-field">
				<input type="text" value="" name="username" id="id6" placeholder="Gebruikersnaam" required>
			</div>
            <div class="authenticator--form-field">
				<input type="text" value="" name="wachtwoord" id="id6" placeholder="wachtwoord" required>
			</div>
            <input style="background: #0bca6a; border: 0;" type="submit" class="button-action authenticator--submit" id="id4" name="submit" value="Registreer">
        </form>
    </div>
    <ul class="authenticator-signin--links">
        <li><a href="login.php">Terug</a></li>
	</ul>
    </div>
    </section>
</body>
</html>