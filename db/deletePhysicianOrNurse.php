<?php
session_start();
include 'db.php';

$physicianOrNurse_id = $_GET['id'];

$sql = $con->query("DELETE FROM physicianOrNurse_tbl  WHERE id = '$physicianOrNurse_id'");

if ($sql) {
    header("Location: http://localhost/rms/");
}else{
  echo mysqli_error($con);
}

?>
