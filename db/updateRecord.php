<?php
session_start();
include 'db.php';


$branch = $_POST["branch"];
$patient_id = $_POST["patient_id"];
$referringPhysicianOrNurse = $_POST["referringPhysicianOrNurse"];
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
  referring_physician_or_nurse = '$referringPhysicianOrNurse',
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
  bplace = '$bplace'
  WHERE
  id = '$patient_id'
");

if ($sql) {
  echo json_encode(array("update" => "success"));
}else{
  echo mysqli_error($con);
}

?>
