<?php
include "db.php";
session_start();

$user_session_id = $_SESSION['user_id'];
$branch = $_POST['branch'];
$title = $_POST["title"];
$name = $_POST["name"];
$uname = $_POST["uname"];
$pword = $_POST["pword"];
$date = date("Y-m-d");
$img = $_FILES['physician_img']['name'];
$check = $con->query("SELECT * FROM admin_accounts WHERE name = '$name' AND uname = '$uname'");
if (mysqli_num_rows($check) > 0) {
  echo json_encode(array("insert" => "failed"));
}else{
  $query = $con->query("INSERT INTO admin_accounts
    (name, title, uname, pword, branch, addedBy, dateRegistered, status, img)
    VALUES
    ('$name','$title','$uname','$pword', '$branch', '$user_session_id', '$date', 1, '$img')
  ");

  if ($query) {
       move_uploaded_file($_FILES['physician_img']['tmp_name'], '/img/uploads/'.$_FILES['physician_img']['name']);

    echo json_encode(array("insert" => "success"));
  }
}

?>
