<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rms";
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  print_r("Failed to connect to MYSQL: ". mysqli_connect_error());
}


?>
