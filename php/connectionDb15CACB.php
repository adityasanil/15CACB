<?php

$servername = "localhost";
$username   = "unaux_24180642";
$password   = "6jf6tis19";
$dbname     = "unaux_24180642_15CACB";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die("Connection failed to database failed! Error: " . mysqli_connect_error());
} else {
    // echo "Database connected";
}
