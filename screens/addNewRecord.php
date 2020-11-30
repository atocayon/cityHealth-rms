<div class="col-md-12 addNewRecord-container">

  <div>
    <img id="patient_img" src=".//img/uploads/default.png" alt="Avatar" style="display: block; margin: auto;width:  150px;
    height: 150px;border-radius: 100px;
    object-fit: cover;" />
   <br/>
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    
    <input type="file" id="upload_patient_img" accept="image/*;capture=camera" capture class="form-control" />
    </div>
    <div class="col-md-4"></div>
   </div>
  </div>

  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    <br/>
        <label>Branch Location</label>
        <input type="text" class="form-control" value="<?= $branch_name ?>" disabled>
        <input type="text" class="form-control" value="<?= $_SESSION['branch'] ?>" hidden id="branch">
        <br/>
        <label>Patient Name</label>
        <input type="text" class="form-control" placeholder="Lastname" id="lname">
        <br/>
        <input type="text" class="form-control" placeholder="Firstname" id="fname">
        <br/>
        <input type="text" class="form-control" placeholder="Middle name" id="mname">
        <br/>

        <label>Gender</label>
        <select id="gender" class="form-control">
          <option value=""></option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <optioN value="others">Others</optioN>
        </select>
        <!-- <input type="text" class="form-control" id="gender"> -->
        <br/>
        <label>Age</label>
        <input type="number" class="form-control" id="age">
        <br/>
        <label>Birthday</label>
        <input type="date" class="form-control" id="bdate">
        <br/>
        <label>Home Address</label>
        <input type="text" class="form-control" id="homeAddress">
        <br/>
        <label>Marital Status</label>
        <input type="text" class="form-control" id="maritalStatus">
        <br/>
        <label>Height (Kg)</label>
        <input type="text" class="form-control" id="height">
        <br/>
        <label>Weight (Kg)</label>
        <input type="text" class="form-control" id="weight">
        <br/>
        <label>Mother's Full name</label>
        <input type="text" class="form-control" id="motherName">
        <br/>
        <label>Father's Full name</label>
        <input type="text" class="form-control" id="fatherName">

        <br/>

        <button type="button" name="button" class="btn btn-primary" id="btn-submitNewRecord" style="width: 100%">Submit</button>
        <br/>
        <br/>
    </div>
    <div class="col-md-2">
    </div>
  </div>

</div>
