<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'screens/includes/head.php'; ?>
  </head>
  <body>
    <?php
      if (isset($_SESSION['user'])) {
        require "screens/home.php";
      }else{
        require "screens/login.php";
      }
    ?>
  </body>
</html>
