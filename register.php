<?php
include "connection.php";
$query = "SELECT * FROM `users` WHERE praktijkbegeleider_user_id IS NULL";
$result = $conn->query($query);
if ($result === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $praktijkbegeleiders[] = $row;
        }
    }
}
if (
    isset($_POST['username'])
    && ($_POST['wachtwoord'])
    && ($_POST['begin_datum'])
    && ($_POST['eind_datum'])
    && ($_POST['totale_uren_stage'])
    && ($_POST['praktijkbegeleider_user_id'])
) {
    $username =  $_POST['username'];
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $begin_datum =  $_POST['begin_datum'];
    $eind_datum =  $_POST['eind_datum'];
    $totale_uren_stage = $_POST['totale_uren_stage'];
    $praktijkbegeleider_user_id = $_POST['praktijkbegeleider_user_id'];
    $user = "INSERT INTO `users`(username, `wachtwoord`, begin_datum, eind_datum, totale_uren_stage, praktijkbegeleider_user_id)
        VALUES ('$username', '$wachtwoord', '$begin_datum', '$eind_datum', '$totale_uren_stage', '$praktijkbegeleider_user_id')";
    if ($conn->query($user) === FALSE) {
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
    <link rel="apple-touch-icon" sizes="180x180" href="https://login.educus.nl/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://login.educus.nl/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://login.educus.nl/assets/img/favicon-16x16.png">
    <link rel="manifest" href="https://login.educus.nl/assets/img/site.webmanifest">
    <link rel="mask-icon" href="https://login.educus.nl/assets/img/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://login.educus.nl/assets/img/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="https://login.educus.nl/assets/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="EduArte Portalen" />
    <meta name="author" content="Iddink Group" />
    <link rel="stylesheet" type="text/css" href="https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/stylesheets/styles-ver-791C75DF32208B3036D6915808D48FEE.css" />
    <link rel="stylesheet" type="text/css" href="fonts.css" />
    <script type="text/javascript">
        /*<![CDATA[*/
        Wicket.Event.add(window, "domready", function(event) {
            $('#id1').eduArioFeedback();;
            Wicket.Event.publish(Wicket.Event.Topic.AJAX_HANDLERS_BOUND);;
        });
        /*]]>*/
    </script>
    <style>
        @font-face {
            font-family: 'Open sans';
            src: url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Light-webfont.woff') format('woff'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Light-webfont.ttf') format('truetype'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Light-webfont.svg#open_sansbold') format('svg');
            font-weight: 300;
            font-style: light;
        }

        @font-face {
            font-family: 'Open sans';
            src: url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Regular-webfont.woff') format('woff'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Regular-webfont.ttf') format('truetype'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Regular-webfont.svg#open_sansregular') format('svg');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open sans';
            src: url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Semibold-webfont.woff') format('woff'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Semibold-webfont.ttf') format('truetype'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Semibold-webfont.svg#open_sansbold') format('svg');
            font-weight: 600;
            font-style: bold;
        }

        @font-face {
            font-family: 'Open sans';
            src: url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Bold-webfont.woff') format('woff'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Bold-webfont.ttf') format('truetype'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/OpenSans-Bold-webfont.svg#open_sansbold') format('svg');
            font-weight: 700;
            font-style: bolder;
        }

        @font-face {
            font-family: 'Nexa';
            src: url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/Nexa-Regular.woff') format('woff'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/Nexa-Regular.ttf') format('truetype');
            font-style: normal;
        }

        @font-face {
            font-family: 'Flaticons Stroke';
            src: url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.eot');
            src: url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.eot?#iefix') format("embedded-opentype"), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.woff') format('woff'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.ttf') format('truetype'), url('https://login.educus.nl/wicket/resource/assets.AssetsResourceReferenceMarker/fonts/flaticons-stroke.svg#flaticons-stroke') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Nexa', sans-serif;
        }
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
                        <input type="password" value="" name="wachtwoord" id="id6" placeholder="wachtwoord" required>
                    </div>
                    <div class="authenticator--form-field">
                        <input type="date" value="" name="begin_datum" id="id6" placeholder="begin_datum" required>
                    </div>
                    <div class="authenticator--form-field">
                        <input type="date" value="" name="eind_datum" id="id6" placeholder="eind_datum" required>
                    </div>
                    <div class="authenticator--form-field">
                        <select name="praktijkbegeleider_user_id" id="praktijkbegeleider_user_id">
                            <?php foreach ($praktijkbegeleiders as $row) : ?>
                                <option value="<?php echo $row['id']; ?>">praktijkbegeleider: <?php echo $row['username']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="authenticator--form-field">
                        <input type="number" name="totale_uren_stage" id="totale_uren_stage" placeholder="totale_uren_stage" required>
                    </div>
                    <input style="background: #0bca6a; border: 0;" type="submit" class="button-action authenticator--submit" id="id4" name="submit" value="Registreer">
                </form>
            </div>
            <ul class="authenticator-signin--links">
                <li><a href="register2.php">Ben je praktijkbegeleider? klik hier</a></li>
                <li><a href="login.php">Terug</a></li>
            </ul>
        </div>
    </section>
</body>

</html>