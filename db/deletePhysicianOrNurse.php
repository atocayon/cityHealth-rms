<?php
session_start();
include 'db.php';

$physicianOrNurse_id = $_GET['id'];

$sql = $con->query("DELETE FROM admin_accounts  WHERE id = '$physicianOrNurse_id'");

if ($sql) {
    header("Location: http://localhost/cityHealth-rms/");
}else{
  echo mysqli_error($con);
}

?>
