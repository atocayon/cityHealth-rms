<?php
session_start();
include 'db.php';

$patient_id = $_POST["patient_id"];
$physicianOrNurse = $_POST["physicianOrNurse"];
$checkUpType = $_POST["checkUpType"];
$treatment = $_POST["treatment"];
$findings = $_POST["findings"];
$date = date("Y-m-d H:i:s");

$sql = $con->query("INSERT INTO check_up_tbl (
  patient_id,
  referringPhysicianOrNurse,
  treatment,
  check_up_type,
  findings,
  dateCheckUp
)
  VALUES (
    '$patient_id',
    '$physicianOrNurse',
    '$treatment',
    '$checkUpType',
    '$findings',
    '$date'
  )");

  if ($sql) {
    echo json_encode(array("insert" => "success"));
    // header("Location: patient.php?id=".$patient_id);
  }else{
    echo "Something went wrong...".mysqli_error($con);
  }

?>
