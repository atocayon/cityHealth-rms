<?php
session_start();
include 'db.php';

$sessionUser = $_POST['sessionUser'];
$username = $_POST['username'];
$password = $_POST['password'];

$check = $con->query("SELECT * FROM admin_accounts WHERE uname = '$username'");
$count  = mysqli_num_rows($check);

if ($count != 0) {
  echo json_encode(array("update" => "duplicate"));
}else{
  $sql = $con->query("UPDATE admin_accounts SET uname = '$username', pword = '$password' WHERE id = '$sessionUser'");
  if ($sql) {
    echo json_encode(array("update" => "success"));
  }else{
    echo mysqli_error($con);
  }
}

?>
