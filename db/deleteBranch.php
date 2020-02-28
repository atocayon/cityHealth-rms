<?php
session_start();
include 'db.php';

$branchID = $_GET['id'];

$sql = $con->query("DELETE FROM branch_tbl WHERE id = '$branchID'");

if ($sql) {
    header("Location: http://localhost/rms/");
}else{
  echo mysqli_error($con);
}

?>
