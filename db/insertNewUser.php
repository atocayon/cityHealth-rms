<?php
session_start();
include 'db.php';

$sessionUser = $_POST['sessionUser'];
$userBranch = $_POST['userBranch'];
$userName = $_POST['userName'];
$userPassword = $_POST['userPassword'];
$date = date("Y-m-d");


$check = $con->query("SELECT * FROM admin_accounts WHERE uname = '$userName' AND pword = '$userPassword'");
$count = mysqli_num_rows($check);

if ($count != 0) {
  echo json_encode(array("insert" => "exist"));
}else{
  $sql = $con->query("INSERT INTO admin_accounts(uname, pword, branch, addedBy, dateRegistered, status)
  VALUES (
    '$userName',
    '$userPassword',
    '$userBranch',
    '$sessionUser',
    '$date',
    0
  )");

  if ($sql) {
    echo json_encode(array("insert" => "success"));
  }else{
    echo mysqli_error($con);
  }
}




?>
