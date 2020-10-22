<?php
session_start();
include './/db/db.php';


  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <?php include 'screens/includes/head.php'; ?>
    </head>
    <body>
      <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $branch_id = $_SESSION["branch"];
          ?>
          <div class="row">
            <?php include 'screens/includes/header.php'; ?>
          </div>

          <br>
          <br>

          <div class="container">
              <?php include 'screens/includes/nav.php'; ?>
              <br>

            <?php
              if ($branch_id !== '7') {
                $sql = $con->query("SELECT * FROM patient_info_tbl WHERE id = '$id' AND branch_id = '$branch_id'");
                $fetch = $sql->fetch_assoc();
              }else{
                $sql = $con->query("SELECT * FROM patient_info_tbl WHERE id = '$id'");
                $fetch = $sql->fetch_assoc();
              }

            ?>

            <div class="row patientInfo-container">
              <div class="col-md-12">
                <table>
                  <?php
                      if ($branch_id === '7') {
                        ?>
                          <tr>

                            <th style="text-align: right">Branch:</th>
                            <td colspan="2">
                              <input type="text" class="form-control" value="<?= $branch_name ?>" disabled>
                              <input type="text" class="form-control" value="<?= $_SESSION['branch'] ?>" hidden id="branch">
                              <input type="text"  value="<?= $id ?>" id="patient_id" hidden>
                            </td>
                          </tr>
                        <?php
                      }
                  ?>

                  <tr>
                    <td rowspan="1"><br></td>
                  </tr>

                  <tr>
                    <th>Patient Name:</th>
                    <td colspan="2">
                      <input type="text" class="form-control" placeholder="Lastname" id="lname" disabled value="<?= $fetch['lname'] ?>">
                    </td>

                    <td colspan="2">
                      <input type="text" class="form-control" placeholder="Firstname" id="fname" disabled value="<?= $fetch['fname'] ?>">
                    </td>

                    <td>
                      <input type="text" class="form-control" placeholder="Middle name" id="mname" disabled value="<?= $fetch['mname'] ?>">
                    </td>
                  </tr>

                  <tr>
                    <td rowspan="1"><br></td>
                  </tr>

                  <tr>
                    <th>Gender:</th>
                    <td>
                      <input type="text" class="form-control" id="gender" disabled value="<?= $fetch['gender'] ?>">
                    </td>

                    <th style="text-align: right">Age:</th>
                    <td>
                      <input type="number" class="form-control" id="age" disabled value="<?= $fetch['age'] ?>">
                    </td>

                    <th style="text-align: right">Birthdate:</th>
                    <td>
                      <input type="date" class="form-control" id="bdate" disabled value="<?= $fetch['bday'] ?>">
                    </td>
                  </tr>

                  <tr>
                    <td rowspan="1"><br></td>
                  </tr>

                  <tr>
                    <th>Home Address:</th>
                    <td>
                      <input type="text" class="form-control" id="homeAddress" disabled value="<?= $fetch['address'] ?>">
                    </td>

                    <th style="text-align: right">Birthplace:</th>
                    <td>
                      <input type="text" class="form-control" id="bplace" disabled value="<?= $fetch['bplace'] ?>">
                    </td>

                    <th style="text-align: right">Marital Status:</th>
                    <td>
                      <input type="text" class="form-control" id="maritalStatus" disabled value="<?= $fetch['marital_status'] ?>">
                    </td>
                  </tr>

                  <tr>
                    <td rowspan="1"><br></td>
                  </tr>

                  <tr>
                    <th>Height:</th>
                    <td>
                      <input type="text" class="form-control" id="height" disabled value="<?= $fetch['height'] ?>">
                    </td>

                    <th style="text-align: right">Weight:</th>
                    <td>
                      <input type="text" class="form-control" id="weight" disabled value="<?= $fetch['weight'] ?>">
                    </td>
                  </tr>

                  <tr>
                    <td rowspan="1"><br></td>
                  </tr>

                  <tr>
                    <th>Mother's Name:</th>
                    <td>
                      <input type="text" class="form-control" id="motherName" disabled value="<?= $fetch['mothers_name'] ?>">
                    </td>

                    <th style="text-align: right">Father's Name:</th>
                    <td>
                      <input type="text" class="form-control" id="fatherName" disabled value="<?= $fetch['fathers_name'] ?>">
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="1"><br></td>
                  </tr>
                  <tr>
                    <th colspan="6" style="text-align: right">
                      <button type="button" name="button" class="btn btn-default" id="btn-editRecord">Edit</button>
                        <button type="button" name="button" class="btn btn-default" id="btn-updateRecord" style="display:none;">Update</button>
                    </th>
                    <th></th>
                    <th></th>

                    <th>
                      <button type="button" name="button" class="btn btn-danger" id="btn-deleteRecord" onclick="return confirm('Are you sure?')">Delete</button>
                    </th>

                    <th></th>
                    <th></th>
                    <th>
                      <button type="button" name="button" class="btn btn-primary" id="btn-checkUp" data-toggle="modal" data-target="#myModal">Check Up</button>
                    </th>
                  </tr>
                </table>
              </div>
            </div>



            <div class="row">
              <div class="col-md-12">

                <!-- The Modal -->
                <div class="modal" id="myModal">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <b><h4 class="modal-title"> <i class="fas fa-user"></i> <?= $fetch['fname'] ?>&nbsp;&nbsp;<?= $fetch['mname'] ?>&nbsp;&nbsp;<?= $fetch['lname'] ?></h4></b>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <table>
                              <tr>
                                <td>Referring Physician/Nurse: </td>
                                <td>
                                  <select class="form-control" id="physicianOrNurse">
                                    <option value="">--Select--</option>
                                    <?php
                                      $select = $con->query("SELECT * FROM physicianOrNurse_tbl");
                                      while ($row = mysqli_fetch_array($select)) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['fname'] ?>&nbsp;&nbsp;<?= $row['mname'] ?>&nbsp;&nbsp;<?= $row['lname'] ?></option>
                                        <?php
                                      }
                                    ?>
                                  </select>

                                </td>
                              </tr>

                              <tr>
                                <td rowspan="1"><br></td>
                              </tr>


                              <tr>
                                <td>Check-Up Type:</td>
                                <td>
                                  <select class="form-control" id="checkUpType">
                                    <option value="">---Select---</option>
                                    <option value="PRENATAL">Prenatal</option>
                                    <option value="ADULT">Adult</option>
                                    <option value="CHILD">Child</option>
                                  </select>
                                </td>
                              </tr>

                              <tr>
                                <td rowspan="1"><br></td>
                              </tr>


                              <tr>
                                <td>
                                  Treatment:
                                </td>
                                <td>
                                  <textarea name="name" rows="8" class="form-control" id="treatment"></textarea>

                                </td>
                              </tr>



                              <tr>
                                <td rowspan="1"><br></td>
                              </tr>

                              <tr>
                                <td>
                                  Findings:
                                </td>
                                <td>
                                  <input name="name" class="form-control" id="findings"></input>

                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-saveCheckUp">Save</button>
                      </div>

                    </div>
                  </div>
                </div>

                <br>
                <br>
                <br>
                <center>
                  <h4>
                    <b>Check up Record</b>
                  </h4>
                </center>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Referring Physician/Nurse</th>
                      <th>Check Up Type</th>
                      <th>Treatment</th>
                      <th>Findings</th>
                      <th>Date Check Up</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $records = $con->query("SELECT * FROM check_up_tbl WHERE patient_id = '$id' ORDER BY dateCheckUp DESC");
                      while($res = mysqli_fetch_array($records)){
                        ?>
                          <tr>
                            <td><?= $res['referringPhysicianOrNurse'] ?></td>
                            <td><?= $res['check_up_type'] ?></td>
                            <td><?= $res['treatment'] ?></td>
                            <td><?= $res['findings'] ?></td>
                            <td><?= date_format($res['dateCheckUp'], Y-M-d) ?></td>
                          </tr>
                        <?php
                      }
                    ?>
                  </tbody>

                </table>
              </div>
            </div>

          </div>


          <?php

          }
      ?>
    </body>
  </html>

  <?php



?>
