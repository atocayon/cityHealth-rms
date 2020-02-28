<?php
session_start();
include 'db.php';

$id = $_GET['id'];

$sql = $con->query("DELETE FROM admin_accounts  WHERE id = '$id'");

if ($sql) {
    header("Location: http://localhost/rms/");
}else{
  echo mysqli_error($con);
}

?>
