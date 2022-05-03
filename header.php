<!DOCTYPE html>
<html lang="en">
<head>
    <link rel=stylesheet href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./wicket/resource/assets.AssetsResourceReferenceMarker/stylesheets/styles-ver-791C75DF32208B3036D6915808D48FEE.css" />
    <title>Document</title>
</head>
<body>
    <div class="loginstatus">
        <?php echo $_SESSION['username']; ?>
            &nbsp;
            <button onclick="window.location.href='logout.php'">Logout</button>
    </div>
    <div class="title">
        <h1>Eduarte</h1>
    </div>