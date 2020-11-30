<?php
include ".//db/db.php";
$user = $_SESSION['user'];
?>
<div class="container userManagement">
  <div class="row">

    <div class="col-md-8">
  
      <div class="row">
        <div class="col-md-12">
          <?php

            $sql1 = $con->query("SELECT * FROM admin_accounts WHERE uname = '$user'");
            $res = $sql1->fetch_assoc();
          ?>
          
          <img id="physician_img" alt="Avatar" src=".//img/uploads/<?= $res['img'] ?>" style="display: block; margin: auto;width:  150px;
    height: 150px;border-radius: 100px;
    object-fit: cover;" />
    <br/>
  <input id="update_physician_img" type="file" accept="image/*" disabled style="margin-left: 15vw" />
    <br/>
    <br/>
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
          
          <label>Title/Position:</label>
          <input type="text" value="<?= $res['title'] ?>" disabled id="user-Title" class="form-control" />
          <label>Full Name:</label>
          <input type="text" value="<?= $res['name'] ?>" disabled id="user-Name" class="form-control" />
          <label>Username:</label>
          <input type="text" value="<?= $res['uname'] ?>" disabled id="user-Username" class="form-control">
          <label>Password:</label>
          <input type="password" value="<?= $res['pword'] ?>"  disabled id="user-Password" class="form-control">
          <br>
          <br>
          <button type="button" id="btn-editUserInfo" class="btn btn-primary" title="Update Information"> <i class="fas fa-user-edit"></i> </button>
          <button type="button" id="btn-updateUserInfo" class="btn btn-primary" title="Save" style="display:none"> <i class="fas fa-save"></i> </button>
          <br/>
          <br/>
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


