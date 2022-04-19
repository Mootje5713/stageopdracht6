<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "stage6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo $_SERVER['REQUEST_URI'];
var_dump($_SERVER['REQUEST_URI']);
if (!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI']!='/stageopdracht6/login.php'
&& $_SERVER['REQUEST_URI']!='/stageopdracht6/register.php') {
    header("Location: login.php");
}

$mystring = $_SERVER['REQUEST_URI'];
$findme = '_pb';
$pos = strpos($mystring, $findme);

if ($pos === false) {
    echo "The string '$findme' was not found in the string $mystring";
} else {
    echo "The string '$findme' was found in the string $mystring";
    echo " and exists at position $pos";
}
