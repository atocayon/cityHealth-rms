<?php
session_start();
include 'db.php';

$img = $_FILES['update_img']['name'];
$branch = $_POST["branch"];
$patient_id = $_POST["patient_id"];
$lname = $_POST["lname"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$bdate = $_POST["bdate"];
$homeAddress = $_POST["homeAddress"];
$bplace = $_POST["bplace"];
$maritalStatus = $_POST["maritalStatus"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$motherName = $_POST["motherName"];
$fatherName = $_POST["fatherName"];

$sql = $con->query("UPDATE patient_info_tbl
  SET
  lname = '$lname',
  fname = '$fname',
  mname = '$mname',
  gender = '$gender',
  bday = '$bdate',
  age = '$age',
  address = '$homeAddress',
  marital_status = '$maritalStatus',
  height = '$height',
  weight = '$weight',
  mothers_name = '$motherName',
  fathers_name = '$fatherName',
  bplace = '$bplace',
  img = '$img'
  WHERE
  id = '$patient_id'
");

if ($sql) {
  move_uploaded_file($_FILES['update_img']['tmp_name'], "../img/uploads".$img);
  echo json_encode(array("update" => "success"));
}else{
  echo mysqli_error($con);
}

?>
