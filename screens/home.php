<?php
include './/db/db.php';
?>
  <div class="row">
    <div class="col-md-12">
      <div id="header-container">
        <div class="row">
          <div class="col-md-2">

          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-1 text-right">
                <img src=".//img/download.jpeg" id="home-site-logo">
              </div>

              <div class="col-md-11">
                <h1>Centralized City Health Centers Record Management System</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-2">
            <a href="#" id="dashboard"> <i class="fab fa-buromobelexperte"></i>&nbsp;Dashboard</a>
          </div>

          <div class="col-md-2">
            <a href="#" id="transaction"> <i class="fas fa-plus-square"></i>&nbsp;New Record</a>
          </div>

          <div class="col-md-2">
            <a href="#" id="reports"> <i class="fas fa-clipboard-list"></i>&nbsp;Generate Reports</a>
          </div>

          <div class="col-md-2">
            <a href="#" id="userManagement"> <i class="fas fa-user-cog"></i>&nbsp;User Management</a>
          </div>

          <div class="col-md-2">
            <a href="#" id="maintenance"> <i class="fas fa-cogs"></i>&nbsp;Maintenance</a>
          </div>

          <div class="col-md-2">
            <a href=".//db/logout.php" id="logout"> <i class="fas fa-power-off"></i>&nbsp;Logout, <?= $_SESSION['user'] ?> -

              <?php
                $branch_id = $_SESSION["branch"];
                $branch_name = "";
                $selectBranch = $con->query("SELECT * FROM branch_tbl WHERE id = '$branch_id'");
                $result = $selectBranch->fetch_assoc();
                echo "&nbsp;&nbsp;&nbsp;".$branch_name = $result['branch_name'];
              ?>
            </a>
          </div>
        </div>

      </div>
    </div>

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


              $sql = "SELECT fname, LEFT(mname, 1) as middle,lname , id, gender, age FROM patient_info_tbl";
              $result = $con->query($sql);

              if ($result) {
                while($row = $result->fetch_assoc()){
                  ?>
                  <tr>
                    <td><?= $row['fname']." ".$row["middle"].". ".$row["lname"] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['age'] ?></td>
                    <td>
                      <a href="#">View More</a>
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
      <div class="col-md-12">
        <table>
          <tr>
            <th>Referring Physician/Nurse:</th>
            <td colspan="2" >
              <input type="text" class="form-control" id="referringPhysicianOrNurse">
            </td>

            <th style="text-align: right">Branch:</th>
            <td colspan="2">
              <input type="text" class="form-control" value="<?= $branch_name ?>" disabled>
              <input type="text" class="form-control" value="<?= $_SESSION['branch'] ?>" hidden id="branch">
            </td>
          </tr>

          <tr>
            <td rowspan="1"><br></td>
          </tr>

          <tr>
            <th>Patient Name:</th>
            <td colspan="2">
              <input type="text" class="form-control" placeholder="Lastname" id="lname">
            </td>

            <td colspan="2">
              <input type="text" class="form-control" placeholder="Firstname" id="fname">
            </td>

            <td>
              <input type="text" class="form-control" placeholder="Middle name" id="mname">
            </td>
          </tr>

          <tr>
            <td rowspan="1"><br></td>
          </tr>

          <tr>
            <th>Gender:</th>
            <td>
              <input type="text" class="form-control" id="gender">
            </td>

            <th style="text-align: right">Age:</th>
            <td>
              <input type="number" class="form-control" id="age">
            </td>

            <th style="text-align: right">Birthdate:</th>
            <td>
              <input type="date" class="form-control" id="bdate">
            </td>
          </tr>

          <tr>
            <td rowspan="1"><br></td>
          </tr>

          <tr>
            <th>Home Address:</th>
            <td>
              <input type="text" class="form-control" id="homeAddress">
            </td>

            <th style="text-align: right">Birthplace:</th>
            <td>
              <input type="text" class="form-control" id="bplace">
            </td>

            <th style="text-align: right">Marital Status:</th>
            <td>
              <input type="text" class="form-control" id="maritalStatus">
            </td>
          </tr>

          <tr>
            <td rowspan="1"><br></td>
          </tr>

          <tr>
            <th>Height:</th>
            <td>
              <input type="text" class="form-control" id="height">
            </td>

            <th style="text-align: right">Weight:</th>
            <td>
              <input type="text" class="form-control" id="weight">
            </td>
          </tr>

          <tr>
            <td rowspan="1"><br></td>
          </tr>

          <tr>
            <th>Mother's Name:</th>
            <td>
              <input type="text" class="form-control" id="motherName">
            </td>

            <th style="text-align: right">Father's Name:</th>
            <td>
              <input type="text" class="form-control" id="fatherName">
            </td>
          </tr>
          <tr>
            <td rowspan="1"><br></td>
          </tr>
          <tr>
            <th colspan="6" style="text-align: right">
              <button type="button" name="button" style="border-radius: 10px;border: 1px solid #9E9E9E;padding: 5px" id="btn-submitNewRecord">Submit</button>
            </th>
          </tr>
        </table>
      </div>
    </div>
  </div>
