<?php
$servername = "localhost";
$username = "act";
$password = "kiraismyname";
$dbname = "rms";
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
