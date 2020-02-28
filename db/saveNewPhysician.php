<?php
include "db.php";
session_start();

$title = $_POST["title"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];

$check = $con->query("SELECT * FROM physicianOrNurse_tbl WHERE lname = '$lname' AND fname = '$fname' AND mname = '$mname' AND title = '$title'");
if (mysqli_num_rows($check) > 0) {
  echo json_encode(array("insert" => "failed"));
}else{
  $query = $con->query("INSERT INTO physicianOrNurse_tbl
    (lname,fname,mname,title,status)
    VALUES
    ('$lname','$fname','$mname','$title', 1)
  ");

  if ($query) {
    echo json_encode(array("insert" => "success"));
  }
}

?>
