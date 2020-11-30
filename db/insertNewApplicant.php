<?php
session_start();
date_default_timezone_set('Asia/Taipei');
include "db.php";

$img = $_FILES['patient_img']['name'];
$branch_id = $_POST["branch_id"];
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
$date = date("Y-m-d H:i:s");

$check = $con->query("SELECT * FROM patient_info_tbl WHERE lname = '$lname' AND fname = '$fname' AND mname = '$mname' AND gender = '$gender' AND bday = '$bdate' AND age = '$age'");

if (mysqli_num_rows($check) == 0) {
  $sql = $con->query("INSERT INTO
    patient_info_tbl
    (
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
      branch_id,
      dateRecorded,
      status,
      img
    )
    VALUES
    (
      '$lname',
      '$fname',
      '$mname',
      '$gender',
      '$bdate',
      '$age',
      '$homeAddress',
      '$maritalStatus',
      '$height',
      '$weight',
      '$motherName',
      '$fatherName',
      '$bplace',
      '$branch_id',
      '$date',
      1,
      '$img'
    )
    ");

    if ($sql) {
      move_uploaded_file($_FILES['patient_img']['tmp_name'], '/img/uploads/'.$img);
      echo json_encode(array("insert" => "success"));
    }else{
      echo "Something went wrong...".mysqli_error($con);
    }
}else{
  // echo $con->error;
  echo json_encode(array("insert" => "dupplication"));
}


?>
