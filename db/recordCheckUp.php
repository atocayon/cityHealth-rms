<?php
session_start();
include 'db.php';

$file = $_FILES['scanned_form']['name'];
$patient_id = $_POST["patient_id"];
$physicianOrNurse = $_SESSION["user_id"];
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
  dateCheckUp,
  attachment
)
  VALUES (
    '$patient_id',
    '$physicianOrNurse',
    '$treatment',
    '$checkUpType',
    '$findings',
    '$date',
    '$file'
  )");

  if ($sql) {
    move_uploaded_file($_FILES['scanned_form']['tmp_name'], "/img/uploads/".$file);
    echo json_encode(array("insert" => "success"));
    // header("Location: patient.php?id=".$patient_id);
  }else{
    echo "Something went wrong...".mysqli_error($con);
  }

?>
