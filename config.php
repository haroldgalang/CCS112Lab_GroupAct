<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ccs112lab";

$mysqli = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Connection Successful bruh";
}
?>
