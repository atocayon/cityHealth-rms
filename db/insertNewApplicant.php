<?php
session_start();
include "db.php";

$branch_id = $_POST["branch_id"];
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

$sql = $con->query("INSERT INTO
  patient_info_tbl
  (
    referring_physician_or_nurse,
    lname,
    fname,
    mname,
    gender,
    bday,
    age,
    address,
    marital_status,
    height,
    weight,
    mothers_name,
    fathers_name,
    bplace,
    branch_id
  )
  VALUES
  (
    '$referringPhysicianOrNurse',
    '$lname',
    '$fname',
    '$mname',
    '$gender',
    '$bdate',
    '$age',
    '$homeAddress',
    '$bplace',
    '$maritalStatus',
    '$height',
    '$weight',
    '$motherName',
    '$fatherName',
    '$branch_id'
  )
  ");

  if ($sql) {
    echo json_encode(array("insert" => "success"));
  }else{
    echo "Something went wrong...".mysqli_error($con);
  }

?>
