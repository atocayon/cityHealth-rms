<?php
session_start();
include 'db.php';


$uname = $_POST['uname'];
$pword = $_POST['pword'];

$sql = $con->query("SELECT * FROM admin_accounts WHERE uname = '$uname' AND pword = '$pword' ");

if ($sql) {
  $row = $sql->fetch_assoc();
  $_SESSION["user"] = $row['uname'];
  $_SESSION["branch"] = $row['branch'];
  echo json_encode(array("login" => "success"));
}else{
  echo("Error description: " . mysqli_error($con));
}

?>
