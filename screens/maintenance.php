<?php
include './/db/db.php';

?>
<div class="container ">
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <div class="">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#managePatientModal">Manage Patient</button>
        </div>
        <br>

          <?php
          $id = $_SESSION['branch'];
            $query_select = $con->query("SELECT * FROM branch_tbl WHERE id = '$id'");
            $res_querySelect = $query_select->fetch_assoc();

            if ($res_querySelect['id'] == '7') {
              ?>
              <div class="">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#manageBranchModal">Manage Branch</button>
              </div>
              <?php
            }
          ?>


        <br>
        <div class="">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#managePhysicianOrNurseModal">Manage Physician/Nurse</button>
        </div>
        <br>
        <div class="">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#manageAdminModal">Manage Admin Accounts</button>
        </div>
      </div>
      <div class="col-md-4">

      </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="managePatientModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manage Patient</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table id="tbl-modalManagePatient" class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Branch</th>
                  <!-- <th>Status</th>
                  <th>Action</th> -->
                </tr>
              </thead>
              <?php
               $branch_id = $_SESSION["branch"];
               if ($branch_id !== '7') {
                 $sql = "SELECT fname, LEFT(mname, 1) as middle,lname , id, gender, age, address, branch_id,status FROM patient_info_tbl WHERE branch_id = '$branch_id' ORDER BY dateRecorded DESC";
                 $result = $con->query($sql);

               }else{
                 $sql = "SELECT fname, LEFT(mname, 1) as middle,lname , id, gender, age, address, branch_id,status FROM patient_info_tbl ORDER BY dateRecorded DESC";
                 $result = $con->query($sql);
               }

               if ($result) {
                 while($row = $result->fetch_assoc()){
                   ?>
                   <tr>
                     <td><?= $row['fname']." ".$row["middle"].". ".$row["lname"] ?></td>
                     <td><?= $row['gender'] ?></td>
                     <td>
                       <?php

                       $branch = $row['branch_id'];
                       $select = $con->query("SELECT * FROM branch_tbl WHERE id = '$branch' AND status = 1");
                       $res_select = $select->fetch_assoc();
                       $count_select = mysqli_num_rows($select);

                       if ($count_select != 0) {
                         echo $res_select['branch_name'];
                       }else{
                         echo "Deactivated";
                       }
                        ?>
                   </td>
                     <!-- <td><?php

                      if ($row['status'] == 0) {
                        echo "Deactivated";
                      }else{
                        echo "Active";
                      }

                     ?></td>
                     <td>
                       <div class="row">
                          <?php
                            if ($row['status'] == 0) {
                              ?>
                                <a href=".//db/activatePatient.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary " onclick="return confirm('Are you sure?')">Activate</a>
                              <?php
                            }else{
                              ?>
                                <a href=".//db/deactivatePatient.php?id=<?= $row['id'] ?>"  class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')">Deactivate</a>
                              <?php
                            }
                          ?>

                       </div>

                     </td> -->
                   </tr>
                   <?php
                 }
               }else {
                   echo $con->error;
               }



              ?>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="manageBranchModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manage Branch</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table" id="tbl-manageBranch">
              <thead>
                <tr>
                  <th>Branch Name</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
                </tr>
              </thead>

              <?php
                $sql1 = $con->query("SELECT * FROM branch_tbl");
                while($row1 = mysqli_fetch_array($sql1)){
                  ?>
                  <tr>
                    <td><?= $row1['branch_name'] ?></td>
                    <!-- <td><?php
                      if ($row1['status'] == 0) {
                        echo "Deactivated";
                      }else{
                        echo "Active";
                      }
                    ?></td> -->
                    <td>
                      <div class="row">
                        <?php
                          if ($row1['status'] == 0) {
                            ?>
                              <input type="text" class="branch-id" value="<?= $row1['id'] ?>" hidden>
                              <a href=".//db/activateBranch.php?id=<?= $row1['id'] ?>" class="btn btn-sm btn-primary "  onclick="return confirm('Are you sure?')">Activate</a>
                              <a href=".//db/deleteBranch.php?id=<?= $row1['id'] ?>" class="btn btn-outline-danger"  onclick="return confirm('Are you sure?')">Delete</a>
                            <?php
                          }else{
                            ?>
                              <a href=".//db/deactivateBranch.php?id=<?= $row1['id'] ?>" class="btn btn-sm btn-warning " onclick="return confirm('Are you sure?')">Deactivate</a>
                            <?php
                          }
                        ?>


                      </div>
                    </td>
                  </tr>
                  <?php
                }
              ?>
            </table>
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn-addNewBranch" >Add New Branch</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="managePhysicianOrNurseModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manage Physician or Nurse</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="tableManagePhysician-container">
          <table class="table" id="manage-physicianOrNurse">
            <thead>
              <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql2 = $con->query("SELECT concat(fname, ' ' ,LEFT(mname, 1),'. ', lname) as name, title, status,id FROM physicianOrNurse_tbl");
                while($row2 = mysqli_fetch_array($sql2)){
                  ?>
                    <tr>
                      <td><?= $row2['name'] ?></td>
                      <td><?= $row2['title'] ?></td>
                      <td>
                        <?php
                          if ($row2['status'] == 0) {
                            echo "Deactivated";
                          }else{
                            echo "Active";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($row2['status'] == 0) {
                            $id = $row2['id'];
                            $query_string = 'id=' . urlencode($id);
                            ?>

                              <a href=".//db/activatePhysicianOrNurse.php?<?= $query_string ?>" class="btn btn-sm btn-primary"  onclick="return confirm('Are you sure?')">Activate</a>
                              <a href=".//db/deletePhysicianOrNurse.php?<?= $query_string ?>" class="btn btn-sm btn-outline-danger "  onclick="return confirm('Are you sure?')">Delete</a>
                            <?php
                          }else{
                            ?>
                              <a href=".//db/deactivatePhysicianOrNurse.php?id=<?= $row2['id'] ?>" class="btn btn-sm btn-warning " onclick="return confirm('Are you sure?')">Deactivate</a>
                            <?php
                          }
                        ?>
                      </td>
                    </tr>
                  <?php
                }

              ?>
            </tbody>
          </table>
        </div>

        <div class="addNewPhysician-container" style="display:none;">
          <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
              <input type="text" id="title" class="form-control" placeholder="Title/Position">
              <br>
              <input type="text" id="physician_fname" class="form-control" placeholder="Firstname">
              <br>
              <input type="text" id="physician_mname" class="form-control" placeholder="Middle name">
              <br>
              <input type="text" id="physician_lname" class="form-control" placeholder="Lastname">
              <br>

            </div>
            <div class="col-md-2">

            </div>
          </div>
        </div>



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btn-addNewPhysician">Add New Physician/Nurse</button>
        <button type="button" name="button" class="btn btn-outline-primary" id="btn-backManagePhysician" style="display:none;">Back</button>
        <button type="button" name="button" class="btn btn-success" id="btn-saveNewPhysician" style="display:none;">Save</button>

      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="manageAdminModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manage Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="tableManageAdmin-container">
          <table class="table" id="tbl-manageAdmin">
            <thead>
              <tr>
                <th>Username</th>
                <?php
                  $sql3 = $con->query("SELECT * FROM admin_accounts");
                  $res_sql3 = $sql3->fetch_assoc();
                  if ($res_sql3['branch'] == '7') {
                    ?>
                      <th>Branch</th>
                    <?php
                  }
                 ?>
                <th>Added By</th>
                <th>Date Registered</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($row3 = mysqli_fetch_array($sql3)) {
                  ?>
                    <tr>
                      <td><?= $row3['uname'] ?></td>
                      <?php
                        if ($res_sql3['branch'] == '7') {
                          ?>
                            <td>
                              <?php
                                $branchID = $row3['branch'];
                                $select_branch = $con->query("SELECT * FROM branch_tbl WHERE id = '$branchID'");
                                $res_selectBranch = $select_branch->fetch_assoc();
                                  echo $res_selectBranch['branch_name'];

                              ?>
                            </td>
                          <?php
                        }
                      ?>
                      <td>
                        <?php
                          $userID = $row3['addedBy'];
                          $select_user = $con->query("SELECT * FROM admin_accounts WHERE id = '$userID'");
                          $res_selectUser = $select_user->fetch_assoc();
                          echo $res_selectUser['uname'];
                        ?>
                      </td>
                      <td>
                        <?= $row3['dateRegistered'] ?>
                      </td>
                      <td>
                        <?php
                          if ($row3['status'] == 0) {
                            echo "Deactivated";
                          }else{
                            echo "Active";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($row3['status'] == 0) {
                            ?>
                              <a href=".//db/activateAdmin.php?id=<?= $row3['id'] ?>" class="btn btn-sm btn-primary "  onclick="return confirm('Are you sure?')">Activate</a>
                              <a href=".//db/deleteAdmin.php?id=<?= $row3['id'] ?>" class="btn btn-sm btn-outline-danger " onclick="return confirm('Are you sure?')">Delete</a>
                            <?php
                          }else{
                            ?>
                              <a href=".//db/deactivateAdmin.php?id=<?= $row3['id'] ?>" class="btn btn-sm btn-warning btn-branchDeactivate" onclick="return confirm('Are you sure?')">Deactivate</a>
                            <?php
                          }
                        ?>
                      </td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
