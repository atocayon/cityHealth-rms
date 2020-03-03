<?php
include "db.php";

$findings = $_POST['findings'];

$query = $con->query("SELECT DATE_FORMAT(dateCheckUp, '%Y') as year, count(findings) as total FROM check_up_tbl WHERE findings = '$findings'");
if ($query) {
  $array = array();
  while($row = mysqli_fetch_array($query)){

    array_push($array, array("label" => $row['year'], "y" => $row['total']));
  }

  echo json_encode($array, JSON_NUMERIC_CHECK);
}else{
  echo mysqli_error($cons);
}


?>
