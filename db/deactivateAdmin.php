<?php
session_start();
include 'db.php';

$id = $_GET['id'];

$sql = $con->query("UPDATE admin_accounts SET status = 0 WHERE id = '$id'");

if ($sql) {
    header("Location: http://localhost/rms/");
}else{
  echo mysqli_error($con);
}

?>
