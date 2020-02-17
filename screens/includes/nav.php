<div class="row nav-container">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-2">
        <a href="index.php"> <i class="fab fa-buromobelexperte"></i>&nbsp;Dashboard</a>
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
