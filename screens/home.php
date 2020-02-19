<?php
include './/db/db.php';
$user = $_SESSION['user'];
$query = $con->query("UPDATE admin_accounts SET status = 1 WHERE uname = '$user'");
?>
  <div class="row">
    <?php include 'includes/header.php'; ?>
  </div>

  <br>
  <br>

  <div class="container">
    <?php include 'includes/nav.php'; ?>

    <br>
    <br>
    <br>
    <div class="row" id="dashboard-container">
      <div class="col-md-12">
        <table id="tbl-dashboard">
          <thead>
            <tr>
              <th>Name</th>
              <th>Gender</th>
              <th>Age</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
               $branch_id = $_SESSION["branch"];
              if ($branch_id !== '7') {
                $sql = "SELECT fname, LEFT(mname, 1) as middle,lname , id, gender, age FROM patient_info_tbl WHERE branch_id = '$branch_id' AND status = 1 ORDER BY dateRecorded DESC";
                $result = $con->query($sql);

              }else{
                $sql = "SELECT fname, LEFT(mname, 1) as middle,lname , id, gender, age FROM patient_info_tbl WHERE status = 1 ORDER BY dateRecorded DESC";
                $result = $con->query($sql);
              }

              if ($result) {
                while($row = $result->fetch_assoc()){
                  ?>
                  <tr>
                    <td><?= $row['fname']." ".$row["middle"].". ".$row["lname"] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['age'] ?></td>
                    <td>
                      <a href="patient.php?id=<?= $row['id'] ?>" >View More</a>
                    </td>
                  </tr>
                  <?php
                }
              }else {
                  echo $con->error;
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>


    <div class="row" id="transaction-container" style="display:none">
      <?php include 'addNewRecord.php'; ?>
    </div>

    <div class="row" id="userManagement-container" style="display: none">
      <?php include 'userManagement.php'; ?>
    </div>

    <div class="row" id="maintenance-container" style="display: none">
      <?php include 'maintenance.php'; ?>
    </div>



  </div>
