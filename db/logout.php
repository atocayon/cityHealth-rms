<?php
session_start();
include "db.php";


if (isset($_SESSION["user"])) {
  $user = $_SESSION['user'];
  $sql = $con->query("UPDATE admin_accounts SET active = 0 WHERE uname = '$user'");

  // remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: http://localhost/cityHealth-rms/");
}



 ?>
