<?php
session_start();
include "db.php";


if (isset($_SESSION["user"])) {
  // remove all session variables
session_unset();

// destroy the session
session_destroy();

header("Location: http://localhost/rms/");
}



 ?>
