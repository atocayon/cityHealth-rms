<?php
session_start();
include 'db.php';

$branchID = $_GET['id'];

$sql = $con->query("UPDATE branch_tbl SET status = 1 WHERE id = '$branchID'");

if ($sql) {
    header("Location: http://localhost/rms/");
}else{
  echo mysqli_error($con);
}

?>
