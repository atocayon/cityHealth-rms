<?php
include ".//db/db.php";
$user = $_SESSION['user'];
?>
<div class="container userManagement">
  <div class="row">

    <div class="col-md-8">
      <!-- The Modal -->
      <div class="modal" id="userManagementModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add New User</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <label>Branch:</label>
              <select class="form-control" id="userBranch">
                      <option value="">-- Select Branch --</option>
                      <?php


                      $sql = $con->query("SELECT * FROM branch_tbl");
                      while($row = mysqli_fetch_array($sql)){
                        ?>
                          <option value="<?= $row['id'] ?>"><?= $row['branch_name'] ?></option>
                        <?php
                      }
                       ?>
                    </select>
                    <br>
                <label>Username:</label>
                <input type="text" id="userName" class="form-control">
                <br>
                <label>Password:</label>
                <input type="password" id="userPassword" class="form-control">
                <?php
                $select = $con->query("SELECT * FROM admin_accounts WHERE uname = '$user'");
                $res_select = $select->fetch_assoc();
                ?>
                <input type="text" value="<?= $res_select['id'] ?>" class="form-control" hidden id="sessionUser">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <?php

            $sql1 = $con->query("SELECT * FROM admin_accounts WHERE uname = '$user'");
            $res = $sql1->fetch_assoc();
          ?>
          <label>Branch:</label>
          <?php
          $branch = $res['branch'];
          $sql2 = $con->query("SELECT * FROM branch_tbl WHERE id = '$branch'");
          $res_sql2 = $sql2->fetch_assoc();
           ?>
          <input type="text" value="<?= $res_sql2['branch_name'] ?>" disabled class="form-control">
          <label>Date Registered:</label>
          <input type="date" value="<?= $res['dateRegistered'] ?>" disabled class="form-control">
          <label>Added By:</label>
          <?php
            $id = $res['addedBy'];
            $sql3 = $con->query("SELECT * FROM admin_accounts WHERE id = '$id'");
            $res_sql3 = $sql3->fetch_assoc();
          ?>
          <input type="text" value="<?= $res_sql3['uname'] ?>" disabled class="form-control">
          <label>Username:</label>
          <input type="text" value="<?= $res['uname'] ?>" disabled id="user-Username" class="form-control">
          <label>Password:</label>
          <input type="password" value="<?= $res['pword'] ?>"  disabled id="user-Password" class="form-control">
          <br>
          <br>
          <button type="button" id="btn-editUserInfo" class="btn btn-primary" title="Update Information"> <i class="fas fa-user-edit"></i> </button>
          <button type="button" id="btn-updateUserInfo" class="btn btn-primary" title="Save" style="display:none"> <i class="fas fa-save"></i> </button>
          <button type="button" data-toggle="modal" data-target="#userManagementModal" class="btn btn-success" title="Add New User" id="btn-addNewUser"> <i class="fas fa-plus"></i> </button>

        </div>
      </div>



    </div>


    <div class="col-md-4" style="overflow: auto;height: 60vh;border-left: 2px solid #607D8B;">

      <table>
        <?php
          $query = $con->query("SELECT * FROM admin_accounts WHERE uname != '$user'");
          while ($res_query = mysqli_fetch_array($query)) {
            ?>
            <tr>
              <td> <i class="fas fa-user"></i> <?= $res_query['uname'] ?></td>
              <td>
                <?php
                  $status = $res_query['status'];

                  if ($status != '0') {
                    ?>
                    <i class="fas fa-dot-circle" style="color: green"></i>
                    <?php
                  }else{
                    ?>
                    <i class="far fa-dot-circle"></i>
                    <?php
                  }

                ?>
              </td>
            </tr>
            <?php
          }

        ?>
      </table>

    </div>
  </div>
</div>
