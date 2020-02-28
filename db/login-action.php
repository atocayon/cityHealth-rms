<?php
session_start();
include 'db.php';


$uname = $_POST['uname'];
$pword = $_POST['pword'];

$sql = $con->query("SELECT * FROM admin_accounts WHERE uname = '$uname' AND pword = '$pword' AND status = 1");
$count = mysqli_num_rows($sql);
if ($count > 0) {
  $sql1 = $con->query("UPDATE admin_accounts SET active = 1 WHERE uname = '$uname' AND pword = '$pword'");
  $row = $sql->fetch_assoc();
  $_SESSION["user"] = $row['uname'];
  $_SESSION["branch"] = $row['branch'];
  echo json_encode(array("login" => "success"));
}else{
  echo json_encode(array("login" => "failed"));
}

?>
