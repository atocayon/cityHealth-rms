<?php
session_start();
include 'db.php';

$sessionUser = $_SESSION['user_id'];
$img = $_FILES['physician_img']['name'];
$name = $_POST['name'];
$title= $_POST['title'];
$username = $_POST['username'];
$password = $_POST['password'];

$check = $con->query("SELECT * FROM admin_accounts WHERE uname = '$username' AND id != '$sessionUser'");
$count  = mysqli_num_rows($check);

if ($count != 0) {
  echo json_encode(array("update" => "duplicate"));
}else{
  $sql = $con->query("UPDATE admin_accounts SET name='$name', title='$title', uname = '$username', pword = '$password', img='$img' WHERE id = '$sessionUser'");
  if ($sql) {
    move_uploaded_file($_FILES['physician_img']['tmp_name'], '/img/uploads/'.$_FILES['physician_img']['name']);
    echo json_encode(array("update" => "success"));
  }else{
    echo mysqli_error($con);
  }
}

?>
