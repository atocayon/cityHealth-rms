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
            <a href="#" id="logout"> <i class="fas fa-power-off"></i>&nbsp;Logout, <?= $_SESSION['user'] ?> -

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


              $sql = $con->query("SELECT id, concat(fname,' ', LEFT(mname, 1)'.',' ',lname) as name, gender, age FROM patient_info_tbl");

              if ($sql) {
                while($row = mysqli_fetch_array($sql)){
                  ?>
                  <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['age'] ?></td>
                    <td>More Actions</td>
                  </tr>
                  <?php
                }
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
            <td>
              <input type="text" class="form-control">
            </td>

            <th>Branch:</th>
            <td>
              <input type="text" class="form-control" value="<?= $branch_name ?>" disabled>
            </td>
          </tr>

          <tr>
            <td colspan="1"><br></td>
          </tr>

          <tr>
            <th>Patient Name:</th>
            <td>
              <input type="text" class="form-control" placeholder="Lastname">
            </td>

            <td>
              <input type="text" class="form-control" placeholder="Firstname">
            </td>

            <td>
              <input type="text" class="form-control" placeholder="Middle name">
            </td>
          </tr>

          <tr>
            <td colspan="1"><br></td>
          </tr>

          <tr>
            <th>Gender:</th>
            <td>
              <input type="text" class="form-control" >
            </td>

            <th>Age:</th>
            <td>
              <input type="text" class="form-control" >
            </td>

            <th>Birthdate:</th>
            <td>
              <input type="date" class="form-control" >
            </td>
          </tr>

          <tr>
            <td colspan="1"><br></td>
          </tr>

          <tr>
            <th>Home Address:</th>
            <td>
              <input type="text" class="form-control" >
            </td>

            <th>Birthplace:</th>
            <td>
              <input type="text" class="form-control" >
            </td>

            <th>Marital Status:</th>
            <td>
              <input type="text" class="form-control" >
            </td>
          </tr>

          <tr>
            <td colspan="1"><br></td>
          </tr>

          <tr>
            <th>Height:</th>
            <td>
              <input type="text" class="form-control" >
            </td>

            <th>Weight:</th>
            <td>
              <input type="text" class="form-control" >
            </td>
          </tr>

          <tr>
            <td colspan="1"><br></td>
          </tr>

          <tr>
            <th>Mother's Name:</th>
            <td>
              <input type="text" class="form-control" >
            </td>

            <th>Father's Name:</th>
            <td>
              <input type="text" class="form-control" >
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
