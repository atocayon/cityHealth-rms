<div class="container ">
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <div class="">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#managePatientModal">Manage Patient</button>
        </div>
        <br>
        <div class="">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#manageBranchModal">Manage Branch</button>
        </div>
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
                  <th>Status</th>
                  <th>Action</th>
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
                     <td><?php

                      if ($row['status'] == 0) {
                        echo "Deactivated";
                      }else{
                        echo "Active";
                      }

                     ?></td>
                     <td>
                       <div class="row">

                           <a href=".//db/activatePatient.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary " onclick="return confirm('Are you sure?')">Activate</a>
                           <a href=".//db/deactivatePatient.php?id=<?= $row['id'] ?>"  class="btn btn-sm btn-warning" onclick="return confirm('Are you sure?')">Deactivate</a>

                       </div>

                     </td>
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
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <?php
                $sql1 = $con->query("SELECT * FROM branch_tbl");
                while($row1 = mysqli_fetch_array($sql1)){
                  ?>
                  <tr>
                    <td><?= $row1['branch_name'] ?></td>
                    <td><?php
                      if ($row1['status'] == 0) {
                        echo "Deactivated";
                      }else{
                        echo "Active";
                      }
                    ?></td>
                    <td>
                      <div class="row">
                        <input type="text" class="branch-id" value="<?= $row1['id'] ?>" hidden>
                       <a href=".//db/activateBranch.php?id=<?= $row1['id'] ?>" class="btn btn-sm btn-primary btn-branchActivate"  onclick="return confirm('Are you sure?')">Activate</a>
                       <a href=".//db/deactivateBranch.php?id=<?= $row1['id'] ?>" class="btn btn-sm btn-warning btn-branchDeactivate" onclick="return confirm('Are you sure?')">Deactivate</a>
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
        <button type="button" class="btn btn-success" >Add New Branch</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="managePhysicianOrNurseModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manage Physician or Nurse</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="manageAdminModal">
  <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manage Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
