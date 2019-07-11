<?php
$servername = "localhost";
$username   = "sanil";
$password   = "";
$dbname     = "15CACB";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die("Connection failed to database failed! Error: " . mysqli_connect_error());
}
else {
    // echo "Database connected";
}
?>
