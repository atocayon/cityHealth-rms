<div class="col-md-12">
  <table>
    <tr>

      <th style="text-align: right">Branch:</th>
      <td colspan="4">
        <input type="text" class="form-control" value="<?= $branch_name ?>" disabled>
        <input type="text" class="form-control" value="<?= $_SESSION['branch'] ?>" hidden id="branch">
      </td>
    </tr>

    <tr>
      <td rowspan="1"><br></td>
    </tr>

    <tr>
      <th>Patient Name:</th>
      <td colspan="2">
        <input type="text" class="form-control" placeholder="Lastname" id="lname">
      </td>

      <td colspan="2">
        <input type="text" class="form-control" placeholder="Firstname" id="fname">
      </td>

      <td>
        <input type="text" class="form-control" placeholder="Middle name" id="mname">
      </td>
    </tr>

    <tr>
      <td rowspan="1"><br></td>
    </tr>

    <tr>
      <th>Gender:</th>
      <td>
        <input type="text" class="form-control" id="gender">
      </td>

      <th style="text-align: right">Age:</th>
      <td>
        <input type="number" class="form-control" id="age">
      </td>

      <th style="text-align: right">Birthdate:</th>
      <td>
        <input type="date" class="form-control" id="bdate">
      </td>
    </tr>

    <tr>
      <td rowspan="1"><br></td>
    </tr>

    <tr>
      <th>Home Address:</th>
      <td>
        <input type="text" class="form-control" id="homeAddress">
      </td>

      <th style="text-align: right">Birthplace:</th>
      <td>
        <input type="text" class="form-control" id="bplace">
      </td>

      <th style="text-align: right">Marital Status:</th>
      <td>
        <input type="text" class="form-control" id="maritalStatus">
      </td>
    </tr>

    <tr>
      <td rowspan="1"><br></td>
    </tr>

    <tr>
      <th>Height:</th>
      <td>
        <input type="text" class="form-control" id="height">
      </td>

      <th style="text-align: right">Weight:</th>
      <td>
        <input type="text" class="form-control" id="weight">
      </td>
    </tr>

    <tr>
      <td rowspan="1"><br></td>
    </tr>

    <tr>
      <th>Mother's Name:</th>
      <td>
        <input type="text" class="form-control" id="motherName">
      </td>

      <th style="text-align: right">Father's Name:</th>
      <td>
        <input type="text" class="form-control" id="fatherName">
      </td>
    </tr>
    <tr>
      <td rowspan="1"><br></td>
    </tr>
    <tr>
      <th colspan="6" style="text-align: right">
        <button type="button" name="button" class="btn btn-primary" id="btn-submitNewRecord">Submit</button>
      </th>
    </tr>
  </table>
</div>
