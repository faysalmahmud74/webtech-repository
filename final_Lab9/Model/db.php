<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wt_lab6";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

