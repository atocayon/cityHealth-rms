<?php
session_start();
include 'db.php';

$physicianOrNurse_id = $_GET['id'];

$sql = $con->query("UPDATE physicianOrNurse_tbl SET status = 0 WHERE id = '$physicianOrNurse_id'");

if ($sql) {
    header("Location: http://localhost/rms/");
}else{
  echo mysqli_error($con);
}

?>
