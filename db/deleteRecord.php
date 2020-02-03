<?php
session_start();
include 'db.php';


$patient_id = $_POST['patient_id'];

$sql = $con->query("DELETE FROM patient_info_tbl WHERE id = '$patient_id'");

if ($sql) {
  echo json_encode(array("delete" => "success"));
}
?>
