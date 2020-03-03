<?php
include './/db/db.php';

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
          <select class="form-control" id="findings">
            <option value="">-- Select Findings --</option>
            <?php
            $select = $con->query("SELECT * FROM check_up_tbl");

            while($row = mysqli_fetch_array($select)){
              ?>
                <option value="<?= $row['findings'] ?>"><?= $row['findings'] ?></option>
              <?php
            }

            ?>
          </select>
          <br>
          <br>
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="col-md-2">

        </div>
      </div>

    </div>
  </div>
</div>
