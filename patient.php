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
                <div class="row">
                <div class="col-md-3">
                  <img id="patient_img_update" src=".//img/uploads/<?= $fetch['img'] ?>" alt="Avatar" style="width:  250px;
                  height: 250px;
                  object-fit: cover;" />
                  <br/>
                  <input type="file" class="form-control"  accept="image/*" capture id="update_patient_img" disabled />
                  <br/>
                  <?php
                      if ($branch_id === '7') {
                        ?>
                        <label>Health Center Location</label>
                         <input type="text" class="form-control" value="<?= $branch_name ?>" disabled>
                         <input type="text" class="form-control" value="<?= $_SESSION['branch'] ?>" hidden id="branch">
                         <input type="text"  value="<?= $id ?>" id="patient_id" hidden>
                         
                        <?php
                      }
                  ?>
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Lastname" id="lname" disabled value="<?= $fetch['lname'] ?>">
                
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Firstname" id="fname" disabled value="<?= $fetch['fname'] ?>">
                
                <label>Middle Name</label>
                <input type="text" class="form-control" placeholder="Middle name" id="mname" disabled value="<?= $fetch['mname'] ?>">
                <label>Birthdate</label>      
                <input type="date" class="form-control" id="bdate" disabled value="<?= $fetch['bday'] ?>">
                
                  <label>Age</label>
                  <input type="number" class="form-control" id="age" disabled value="<?= $fetch['age'] ?>">
                  <label>Gender</label>
                  <input type="text" class="form-control" id="gender" disabled value="<?= $fetch['gender'] ?>">
                  <label>Birthplace</label>
                  <input type="text" class="form-control" id="bplace" disabled value="<?= $fetch['bplace'] ?>">
                
                  <label>Marital Status</label>
                  <input type="text" class="form-control" id="maritalStatus" disabled value="<?= $fetch['marital_status'] ?>">

                  <label>Height</label>
                   <input type="text" class="form-control" id="height" disabled value="<?= $fetch['height'] ?>">

                  <label>Weight</label>
                  <input type="text" class="form-control" id="weight" disabled value="<?= $fetch['weight'] ?>">

                  <label>Mother's Name</label>
                  <input type="text" class="form-control" id="motherName" disabled value="<?= $fetch['mothers_name'] ?>">
                  <label>Father's Name</label>
                  <input type="text" class="form-control" id="fatherName" disabled value="<?= $fetch['fathers_name'] ?>">
                  <label>Address</label>
                  <input type="text" class="form-control" id="homeAddress" disabled value="<?= $fetch['address'] ?>">

                  <br/>
                  <br/>   
                  <button type="button" name="button" class="btn btn-default" id="btn-editRecord">Edit Info</button>
                  <button type="button" name="button" class="btn btn-default" id="btn-updateRecord" style="display:none;">Update/Save</button>
                  <button type="button" name="button" class="btn btn-danger" id="btn-deleteRecord" onclick="return confirm('Are you sure?')">Delete Record</button>
                    <br/>
                    <br/>
                </div>
                <div class="col-md-9">

                <button type="button" name="button" class="btn btn-primary" id="btn-checkUp" data-toggle="modal" data-target="#myModal">Add Record</button>
                
                <br/>
                <br/>

                <table class="table table-checkup-records">
                  <thead>
                    <tr>
                      <th>Referring Doctor/Nurse</th>
                      <th>Check Up Type</th>
                      <th>Treatment</th>
                      <th>Findings</th>
                      <th>Date Check Up</th>
                      <th>Attachment</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $records = $con->query("SELECT CONCAT(b.name, ' ', ', ',IF(b.title = 'doctor', 'MD', 'RN')) AS referringPhysicianOrNurse, a.check_up_type, a.treatment, a.findings, DATE_FORMAT(a.dateCheckUp, '%M %d, %Y @ %h:%i:%s %p ') AS dateCheckUp, a.attachment  FROM check_up_tbl a LEFT JOIN admin_accounts b ON a.referringPhysicianOrNurse = b.id WHERE a.patient_id = '$id' ORDER BY a.dateCheckUp DESC");
                   
                        while($res = mysqli_fetch_array($records)){
                          ?>
                            <tr>
                              <td><?= $res['referringPhysicianOrNurse'] ?></td>
                              <td><?= $res['check_up_type'] ?></td>
                              <td><?= $res['treatment'] ?></td>
                              <td><?= $res['findings'] ?></td>
                              <td><?= $res['dateCheckUp'] ?></td>
                              <td><a href=".//img/uploads/<?= $res['attachment'] ?>" download><?= $res['attachment'] ?></a></td>
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



            <div class="row">
              <div class="col-md-12">

                <!-- The Modal -->
                <div class="modal" id="myModal">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        Record Medication/Check Up
                        <!-- <b><h4 class="modal-title"> <i class="fas fa-user"></i> <?= $fetch['fname'] ?>&nbsp;&nbsp;<?= $fetch['mname'] ?>&nbsp;&nbsp;<?= $fetch['lname'] ?></h4></b> -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                          <label>Type</label>
                                        <select class="form-control" id="checkUpType">
                                          <option value="">---Select---</option>
                                          <?php 
                                            if($fetch['gender'] === "female" && $_SESSION['title'] === "doctor"){
                                              ?>
                                              <option value="PRENATAL">Prenatal</option>
                                              <option value="BIRTHING">Birthing</option>
                                              
                                              <?php
                                            }
                                          ?>
                                          <option value="REGULAR_CHECKUP">Regular Checkup</option>
                                          <?php 
                                            if($fetch['age'] < 12 && $_SESSION['title'] === "nurse" ){
                                              ?>
                                                <option value="IMMUNIZATION">Child Immunization</option>    
                                              <?php 
                                            }
                                          ?>
                                          
                                        </select>

                                        <br/>

                                        <label>Treatment</label>
                                    <textarea name="name" rows="8" class="form-control" id="treatment"></textarea>
                                    <br/>
                                    <label>Findings</label>
                                    <input name="name" class="form-control" id="findings"></input>
                                    <br/>
                                    <label>Attach Scanned Form</label>
                                    <input type="file" id="scanned_form" accept=".pdf, .docx, .doc" class="form-control" />
                          
                              
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
