<!DOCTYPE html>
<html lang="en">
<head>
    <link rel=stylesheet href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="loginstatus">
        <?php echo $_SESSION['username']; ?>
            &nbsp;
        <a href="logout.php">logout</a>
    </div>
    <div class="title">
        <h1>Eduarte</h1>
    </div>