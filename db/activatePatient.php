<?php
session_start();
include 'db.php';

$patientID = $_GET['id'];

$sql = $con->query("UPDATE patient_info_tbl SET status = 1 WHERE id = '$patientID'");

if ($sql) {
  header("Location: http://localhost/rms/");
}else{
  echo mysqli_error($con);
}

?>
